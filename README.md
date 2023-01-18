<h1>Tugas Besar Mata Kuliah Pemrograman Web Lanjut</h1>
<h3>Kelompok E</h3>
<strong>Studi Kasus di Kampus tentang pengelolaan pendaftaran dan penerimaan mahasiswa baru</strong>
<hr/>
Anggota :
<li> Dendi Pratama Putra Pamungkas (5520120122)</li>
<li> Muhammad Farhan Novian (55202120017)</li>
<li> Muhamad Rizky Maulana S</li>

Langkah Instalasi
<hr/>
git clone https://github.com/lunarcwhite/pengelolaan_pendaftaran_dan_penerimaan_mahasiswa_baru
<br/>
cd pengelolaan_pendaftaran_dan_penerimaan_mahasiswa_baru
<br/>
composer install atau composer update
<br/>
npm install
<br/>
cp .env.example .env
<br/>
php artisan key:generate
<br/>
Atur database
<br/>
php artisan migrate

<strong>Urutan Seeder</strong>
1. php artisan db:seed FakultasSeeder
2. php artisan db:seed JurusansSeeder
3. php artisan db:seed GelombangsSeeder
4. php artisan db:seed RolesSeeder
5. php artisan db:seed UsersSeeder
6. php artisan db:seed PendaftarsSeeder
7. php artisan db:seed AdminSeeder
8. php artisan db:seed SettingSeeder
9. php artisan db:seed KampusSeeder
