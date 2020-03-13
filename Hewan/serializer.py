from rest_framework import serializers
from Hewan.models import Hewan

class HewanSerializer(serializers.ModelSerializer):
    class Meta:
        model = Hewan
        fields = "__all__"