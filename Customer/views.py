from django.http import HttpResponse, JsonResponse
from django.views import View
from Customer.serializer import *

from Customer.models import Customer as Customers

class Customer(View):
    
    def get(self,request):
        c = Customers.objects.all()
        c_serial = CustomerSerializer(c,many=True)
        return JsonResponse(c_serial.data,safe=False)
        