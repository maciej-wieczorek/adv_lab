from django.urls import path
from . import views

urlpatterns = [
    path("", views.IndexView.as_view(), name="movies_list"),
    path("genre/<int:pk>", views.GenreView.as_view(), name="genre_detail"),
    path("movie/<int:pk>", views.MovieView.as_view(), name="movie_detail"),
    path("register", views.register_request, name="register"),
    path("login", views.login_request, name="login"),
]
