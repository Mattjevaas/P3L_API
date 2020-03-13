from django.db import models

class Hewan(models.Model):
    idhewan = models.AutoField(db_column='idHewan', primary_key=True)  # Field name made lowercase.
    namahewan = models.CharField(db_column='namaHewan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    tgllahir = models.DateTimeField(db_column='tglLahir', blank=True, null=True)  # Field name made lowercase.
    idukuranhewan = models.ForeignKey('UkuranHewan.UkuranHewan', models.DO_NOTHING, db_column='idUkuranHewan')  # Field name made lowercase.
    idjenishewan = models.ForeignKey('JenisHewan.JenisHewan', models.DO_NOTHING, db_column='idJenisHewan')  # Field name made lowercase.
    idcustomer_member = models.ForeignKey('Customer.Customer', models.DO_NOTHING, db_column='idCustomer_Member')  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai.Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'hewan'
