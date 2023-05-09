from django.shortcuts import render
from django.http import HttpRequest, HttpResponse
from django.template import loader
from django.shortcuts import get_object_or_404
from django.views import generic
from .models import Movie, Genre


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