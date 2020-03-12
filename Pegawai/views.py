from django.http import JsonResponse
from django.views import View
from Pegawai.serializer import *

from Pegawai.models import Pegawai as Pegawais

class Pegawai(View):

    def get(self,request):
        p = Pegawais.objects.all()
        p_serial = PegawaiSerializer(p,many=True)
        return JsonResponse(p_serial.data,safe=False)
