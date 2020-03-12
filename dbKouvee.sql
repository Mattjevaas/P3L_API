# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey and OneToOneField has `on_delete` set to the desired behavior
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class Customer(models.Model):
    idcustomer_member = models.AutoField(db_column='idCustomer_Member', primary_key=True)  # Field name made lowercase.
    namacustomer = models.CharField(db_column='namaCustomer', max_length=45, blank=True, null=True)  # Field name made lowercase.
    tgllahir = models.DateField(db_column='tglLahir')  # Field name made lowercase.
    alamat = models.CharField(max_length=45, blank=True, null=True)
    notelp = models.CharField(db_column='noTelp', max_length=45, blank=True, null=True)  # Field name made lowercase.
    email = models.CharField(max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'customer'


class HargaLayanan(models.Model):
    idhargalayanan = models.AutoField(db_column='idHargaLayanan', primary_key=True)  # Field name made lowercase.
    hargalayanan = models.FloatField(db_column='hargaLayanan', blank=True, null=True)  # Field name made lowercase.
    idukuranhewan = models.ForeignKey('UkuranHewan', models.DO_NOTHING, db_column='idUkuranHewan')  # Field name made lowercase.
    idjenishewan = models.ForeignKey('JenisHewan', models.DO_NOTHING, db_column='idJenisHewan')  # Field name made lowercase.
    idlayanan = models.ForeignKey('Layanan', models.DO_NOTHING, db_column='idLayanan')  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'harga_layanan'


class Hewan(models.Model):
    idhewan = models.AutoField(db_column='idHewan', primary_key=True)  # Field name made lowercase.
    namahewan = models.CharField(db_column='namaHewan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    tgllahir = models.DateTimeField(db_column='tglLahir', blank=True, null=True)  # Field name made lowercase.
    idukuranhewan = models.ForeignKey('UkuranHewan', models.DO_NOTHING, db_column='idUkuranHewan')  # Field name made lowercase.
    idjenishewan = models.ForeignKey('JenisHewan', models.DO_NOTHING, db_column='idJenisHewan')  # Field name made lowercase.
    idcustomer_member = models.ForeignKey(Customer, models.DO_NOTHING, db_column='idCustomer_Member')  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'hewan'


class JenisHewan(models.Model):
    idjenishewan = models.AutoField(db_column='idJenisHewan', primary_key=True)  # Field name made lowercase.
    jenishewan = models.CharField(db_column='jenisHewan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'jenis_hewan'


class Layanan(models.Model):
    idlayanan = models.AutoField(db_column='idLayanan', primary_key=True)  # Field name made lowercase.
    namalayanan = models.CharField(db_column='namaLayanan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey('Pegawai', models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'layanan'


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


class PengadaanBarang(models.Model):
    idpengadaanbarang = models.AutoField(db_column='idPengadaanBarang', primary_key=True)  # Field name made lowercase.
    namapengadaan = models.CharField(db_column='namaPengadaan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    tglpengadaan = models.DateTimeField(db_column='tglPengadaan', blank=True, null=True)  # Field name made lowercase.
    statusbrgdatang = models.CharField(db_column='statusBrgDatang', max_length=45)  # Field name made lowercase.
    statuscetak = models.CharField(db_column='statusCetak', max_length=255)  # Field name made lowercase.
    idsupplier = models.ForeignKey('Supplier', models.DO_NOTHING, db_column='idSupplier')  # Field name made lowercase.
    idpegawai = models.ForeignKey(Pegawai, models.DO_NOTHING, db_column='idPegawai')  # Field name made lowercase.
    total = models.IntegerField()

    class Meta:
        managed = False
        db_table = 'pengadaan_barang'


class Produk(models.Model):
    idproduk = models.AutoField(db_column='idProduk', primary_key=True)  # Field name made lowercase.
    namaproduk = models.CharField(db_column='namaProduk', max_length=45, blank=True, null=True)  # Field name made lowercase.
    satuan = models.CharField(max_length=45)
    jumlahproduk = models.IntegerField(db_column='jumlahProduk', blank=True, null=True)  # Field name made lowercase.
    hargajual = models.FloatField(db_column='hargaJual', blank=True, null=True)  # Field name made lowercase.
    hargabeli = models.FloatField(db_column='hargaBeli')  # Field name made lowercase.
    stokminimal = models.IntegerField(db_column='stokMinimal', blank=True, null=True)  # Field name made lowercase.
    linkgambar = models.CharField(db_column='linkGambar', max_length=255)  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey(Pegawai, models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'produk'


class RincianPembelian(models.Model):
    idrincianpembelian = models.AutoField(db_column='idRincianPembelian', primary_key=True)  # Field name made lowercase.
    jumlahbeli = models.IntegerField(db_column='jumlahBeli')  # Field name made lowercase.
    jenispembelian = models.CharField(db_column='jenisPembelian', max_length=45)  # Field name made lowercase.
    idproduk = models.ForeignKey(Produk, models.DO_NOTHING, db_column='idProduk', blank=True, null=True)  # Field name made lowercase.
    idhargalayanan = models.ForeignKey(HargaLayanan, models.DO_NOTHING, db_column='idHargaLayanan', blank=True, null=True)  # Field name made lowercase.
    idtransaksipembayaran = models.ForeignKey('TransaksiPembayaran', models.DO_NOTHING, db_column='idTransaksiPembayaran', blank=True, null=True)  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'rincian_pembelian'


class RincianPengadaan(models.Model):
    idrincianpengadaan = models.AutoField(db_column='idRincianPengadaan', primary_key=True)  # Field name made lowercase.
    jumlahbeli = models.IntegerField(db_column='jumlahBeli', blank=True, null=True)  # Field name made lowercase.
    idpengadaanbarang = models.ForeignKey(PengadaanBarang, models.DO_NOTHING, db_column='idPengadaanBarang')  # Field name made lowercase.
    idproduk = models.ForeignKey(Produk, models.DO_NOTHING, db_column='idProduk')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'rincian_pengadaan'


class Supplier(models.Model):
    idsupplier = models.AutoField(db_column='idSupplier', primary_key=True)  # Field name made lowercase.
    namasupplier = models.CharField(db_column='namaSupplier', max_length=45, blank=True, null=True)  # Field name made lowercase.
    alamat = models.CharField(max_length=45)
    notelp = models.CharField(db_column='noTelp', max_length=45)  # Field name made lowercase.
    email = models.CharField(max_length=255)
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey(Pegawai, models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'supplier'


class TransaksiPembayaran(models.Model):
    idtransaksipembayaran = models.AutoField(db_column='idTransaksiPembayaran', primary_key=True)  # Field name made lowercase.
    totalbayar = models.FloatField(db_column='totalBayar', blank=True, null=True)  # Field name made lowercase.
    tgltransaksi = models.DateTimeField(db_column='tglTransaksi', blank=True, null=True)  # Field name made lowercase.
    statuslunas = models.CharField(db_column='statusLunas', max_length=45, blank=True, null=True)  # Field name made lowercase.
    idpegawai = models.ForeignKey(Pegawai, models.DO_NOTHING, db_column='idPegawai')  # Field name made lowercase.
    idhewan = models.ForeignKey(Hewan, models.DO_NOTHING, db_column='idHewan')  # Field name made lowercase.

    class Meta:
        managed = False
        db_table = 'transaksi_pembayaran'


class UkuranHewan(models.Model):
    idukuranhewan = models.AutoField(db_column='idUkuranHewan', primary_key=True)  # Field name made lowercase.
    ukuranhewan = models.CharField(db_column='ukuranHewan', max_length=45, blank=True, null=True)  # Field name made lowercase.
    created_at = models.DateTimeField(blank=True, null=True)
    edited_at = models.DateTimeField(blank=True, null=True)
    deleted_at = models.DateTimeField(blank=True, null=True)
    edited_by = models.ForeignKey(Pegawai, models.DO_NOTHING, db_column='edited_by', blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'ukuran_hewan'
