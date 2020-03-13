from django.http import JsonResponse
from django.views import View
from Hewan.serializer import *

from Hewan.models import Hewan as Hewans

class Hewan(View):

    def get(self,request):
        h = Hewans.objects.all()
        h_serial = HewanSerializer(h,many=True)
        return JsonResponse(h_serial.data,safe=False)
