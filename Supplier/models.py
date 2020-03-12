from django.db import models
from Pegawai.models import Pegawai

class Supplier(models.Model):
    idsupplier = models.AutoField(db_column='idSupplier', primary_key=True)  # Field name made lowercase.
    namasupplier = models.CharField(db_column='namaSupplier', max_length=45, blank=True, null=True)  # Field name made lowercase.
    alamat = models.CharField(max_length=45)
    notelp = models.CharField(db_column='noTelp', max_length=45)  # Field name made lowercase.
    email = models.CharField(max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai.Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'supplier'