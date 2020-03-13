from django.db import models

class UkuranHewan(models.Model):
    idukuranhewan = models.AutoField(db_column='idUkuranHewan', primary_key=True)  # Field name made lowercase.
    ukuranhewan = models.CharField(db_column='ukuranHewan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai.Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'ukuran_hewan'
