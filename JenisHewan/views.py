from django.http import JsonResponse
from django.views import View
from JenisHewan.serializer import *

from JenisHewan.models import JenisHewan as JenisHewans

class JenisHewan(View):

    def get(self,request):
        jh = JenisHewans.objects.all()
        jh_serial = JenisHewanSerializer(jh,many=True)
        return JsonResponse(jh_serial.data,safe=False)