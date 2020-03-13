from django.db import models

class JenisHewan(models.Model):
    idjenishewan = models.AutoField(db_column='idJenisHewan', primary_key=True)  # Field name made lowercase.
    jenishewan = models.CharField(db_column='jenisHewan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai.Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'jenis_hewan'