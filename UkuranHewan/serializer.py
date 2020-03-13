from rest_framework import serializers
from UkuranHewan.models import UkuranHewan

class UkuranHewanSerializer(serializers.ModelSerializer):
    class Meta:
        model = UkuranHewan
        fields = "__all__"