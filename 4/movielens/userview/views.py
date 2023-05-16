from django.shortcuts import render
from django.http import HttpRequest, HttpResponse
from django.template import loader
from django.shortcuts import get_object_or_404, redirect
from django.views import generic
from django.contrib.auth import login, authenticate, logout
from django.contrib.auth.forms import AuthenticationForm
from django.contrib import messages
from .models import Movie, Genre
from .forms import NewUserForm


def index(request: HttpRequest):
    movies = Movie.objects.order_by('-title')
    template = loader.get_template('userview/movies_list.html')
    context = {
        'movies': movies
    }
    return HttpResponse(template.render(context, request))

def view_movie(request: HttpRequest, movie_id):
    movie = get_object_or_404(Movie, id=movie_id)
    movie.genres = movie.genres.all()
    template = loader.get_template('userview/movie_detail.html')
    context = {
        'movie': movie
    }
    return HttpResponse(template.render(context, request))

def view_genre(request: HttpRequest, genre_id):
    genre = get_object_or_404(Genre, id=genre_id)
    template = loader.get_template('userview/genre_detail.html')
    context = {
        'genre': genre
    }
    return HttpResponse(template.render(context, request))

class IndexView(generic.ListView):
    paginate_by = 2
    template_name = 'userview/movies_list.html'
    context_object_name = 'movies'
    def get_queryset(self):
        return Movie.objects.order_by('-title')
    
class MovieView(generic.DetailView):
    model = Movie
    template_name = 'userview/movie_detail.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['genres'] = self.object.genres.all()
        return context

class GenreView(generic.DetailView):
    model = Genre
    template_name = 'userview/genre_detail.html'

def register_request(request):
    if request.method == "POST":
        form = NewUserForm(request.POST)
        if form.is_valid():
            user = form.save()
            login(request, user)
            messages.success(request, "Registration successful.")
            return redirect("/")
        messages.error(request, "Unsuccessful registration. Invalid information.")
    
    form = NewUserForm()
    return render(request=request,template_name="userview/register.html",
                                   context={"register_form":form})

def login_request(request):
    if request.method == "POST":
        form = AuthenticationForm(request, request.POST)
        print(form)
        if form.is_valid():
            username = form.cleaned_data.get('username')
            password = form.cleaned_data.get('password')

            user = authenticate(username=username,password=password)
            if user is not None:
                login(request,user)
                messages.success(request, "Login successful.")
                return redirect("/")
            else:
                messages.error(request, "Unsuccessful login. User does not exist")
        messages.error(request, "Unsuccessful login. Invalid information.")
    
    form = AuthenticationForm()
    return render(request=request,template_name="userview/login.html",
                                   context={"login_form":form})

