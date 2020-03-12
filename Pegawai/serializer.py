from rest_framework import serializers
from Pegawai.models import Pegawai

class PegawaiSerializer(serializers.ModelSerializer):
    class Meta:
        model = Pegawai
        fields = "__all__"