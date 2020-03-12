from django.http import JsonResponse
from django.views import View
from Supplier.serializer import *

from Supplier.models import Supplier as Suppliers

class Supplier(View):
    
    def get(self,request):
        s = Suppliers.objects.all()
        s_serial = SupplierSerializer(s,many=True)
        return JsonResponse(s_serial.data,safe=False)

