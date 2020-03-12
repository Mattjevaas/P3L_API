from django.db import models

class Pegawai(models.Model):
    idpegawai = models.AutoField(db_column='idPegawai', primary_key=True)  # Field name made lowercase.
    namapegawai = models.CharField(db_column='namaPegawai', max_length=120, blank=True, null=True)  # Field name made lowercase.
    alamat = models.CharField(max_length=45, blank=True, null=True)
    tgllahir = models.DateTimeField(db_column='tglLahir', blank=True, null=True)  # Field name made lowercase.
    notelp = models.CharField(db_column='noTelp', max_length=45, blank=True, null=True)  # Field name made lowercase.
    jabatan = models.CharField(max_length=45, blank=True, null=True)
    email = models.CharField(max_length=255)
    password = models.CharField(max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('self', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'pegawai'