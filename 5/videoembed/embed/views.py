from django.shortcuts import render
from .models import EmbeddedVideoItem
from django.views import generic



class VideoListView(generic.ListView):
    paginate_by = 2
    template_name = 'embed/videos_list.html'
    context_object_name = 'videos'
    def get_queryset(self):
        return EmbeddedVideoItem.objects.order_by('-title')
    
class VideoView(generic.DetailView):
    model = EmbeddedVideoItem
    template_name = 'embed/video_detail.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        return context