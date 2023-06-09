from django.urls import path

from . import views

urlpatterns = [
    path("", views.VideoListView.as_view(), name="videos_list"),
    path("video/<int:pk>", views.VideoView.as_view(), name="video_detail"),
]