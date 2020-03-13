"""CouveeAPI URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/3.0/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.urls import path, include

from MyApi.views import MyApi
from Pegawai.views import Pegawai
from Customer.views import Customer
from Supplier.views import Supplier
from Hewan.views import Hewan
from JenisHewan.views import JenisHewan
from UkuranHewan.views import UkuranHewan

urlpatterns = [
    path('',MyApi.as_view()),
    path('pegawai/',Pegawai.as_view()),
    path('customer/',Customer.as_view()),
    path('supplier/',Supplier.as_view()),
    path('hewan/',Hewan.as_view()),
    path('jenis-hewan/',JenisHewan.as_view()),
    path('ukuran-hewan/',UkuranHewan.as_view()),
]
