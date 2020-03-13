from rest_framework import serializers
from JenisHewan.models import JenisHewan

class JenisHewanSerializer(serializers.ModelSerializer):
    class Meta:
        model = JenisHewan
        fields = "__all__"