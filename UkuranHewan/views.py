from django.http import JsonResponse
from django.views import View
from UkuranHewan.serializer import *

from UkuranHewan.models import UkuranHewan as UkuranHewans

class UkuranHewan(View):

    def get(self,request):
        uh = UkuranHewans.objects.all()
        uh_serial = UkuranHewanSerializer(uh,many=True)
        return JsonResponse(uh_serial.data,safe=False)
