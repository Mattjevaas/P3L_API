from django.shortcuts import render
from django.http import HttpResponse
from django.views import View

class MyApi(View):

    def get(self,request):
        return HttpResponse("<h1 style='text-align: center'>API FOR P3L </h1>")