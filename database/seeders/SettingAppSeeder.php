<?php

namespace Database\Seeders;

use App\Models\SettingApp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class SettingAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingApp::create([
            'app_name' => 'Aplikasi QRIS',
            'logo' => '',
            'favicon' => '',
            'phone' => '083874731480',
            'email' => 'saepulramdan244@gmail.com',
            'address' => 'Perumahan SAI Residance Blok E6 , Tajur halang, Kabupaten Bogor',
            'is_password_expired' => 'Yes',
            'tos' => '<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal"><b style="font-family: var(--bs-font-sans-serif); font-size: 1rem;"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">JANGKA WAKTU PERJANJIAN</span></b><br></p>

<p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
normal"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">PARA PIHAK sepakat bahwa Perjanjian ini berlangsung selama 1 (satu)
tahun. Dan akan diperpanjang otomatis untuk setiap tahunnya. Kecuali ada
pemberitahuan 7 (tujuh) hari sebelumnya secara tertulis dari Para Pihak untuk
mengakhiri Perjanjian ini. <o:p></o:p></span></p>

<p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
normal"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">PEMASANGAN DAN PEMELIHARAAN PERALATAN<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-left:13.5pt;mso-add-space:
auto;text-align:justify;text-indent:-13.5pt;line-height:normal;mso-list:l23 level1 lfo12"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Acquirer akan menyediakan dan memasang
EDC beserta Pelatan pada Tempat Usaha Merchant sebagaimana diuraikan dalam
formulir aplikasi Merchant atau lokasi – lokasi lainnya sebagaimana disepakati kemudian
dari waktu ke waktu oleh Para Pihak, di tempat yang ditetapkan oleh Merchant.
Jadwal pemasangan akan disepakati kemudian secara tertulis oleh Para Pihak dan
menjadi bagian yang tidak terpisahkan dari Perjanjian.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-left:13.5pt;mso-add-space:
auto;text-align:justify;text-indent:-13.5pt;line-height:normal;mso-list:l23 level1 lfo12;
tab-stops:13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Merchant wajib atas biaya sendiri, mempersiapkan dan menyediakan
tempat, titik – titik listrik serta sambungan telepon, termasuk menanggung
biaya pemakaian telepon, untuk mengoperasikan EDC di Tempat Usaha Merchant.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-left:13.5pt;mso-add-space:
auto;text-align:justify;text-indent:-13.5pt;line-height:normal;mso-list:l23 level1 lfo12;
tab-stops:13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Acquirer akan menyediakan, memelihara dan memperluas jaringan
infrastruktur EDC untuk mendukung penggunaan kartu serta menyediakan fasilitas
pelayanan sehubungan dengan penggunaan EDC.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l23 level1 lfo12;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Acquirer akan memberikan pelatihan kepada karyawan Merchant yang
ditunjuk, mengenai cara pengoperasian dan hal – hal lain sehubungan dengan EDC,
sesuai jadwal yang akan disepakati Para Pihah terlebih dahulu. Merchant dengan
ini menjamin bahwa setiap EDC hanya akan dioperasikan oleh pihak atau karyawan
Merchant yang telah ditunjuk.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
line-height:normal;tab-stops:13.5pt"><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal;tab-stops:13.5pt"><br></p>

<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal;tab-stops:13.5pt"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">KEPEMILIKAN PERALATAN<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l24 level1 lfo13;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">EDC adalah milik Acquirer dan&nbsp;
karenanya Merchant setuju untuk mengembalikannya apabila terjadi
pengakhiran Perjanjian oleh Para Pihak atau jika diminta Acquirer.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l24 level1 lfo13;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Merchant wajib memelihara dan mengoperasikan dengan sebaik – baiknya
EDC selama berada dalam kekuasaan Merchant dan wajib menjaga agar tidak terjadi
penyalahgunaan akses data pada EDC dan/atau Jaringan EDC.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l24 level1 lfo13;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Merchant dilarang menjual, mengalihkan, menjaminkan atau dengan cara
lain melakukan tindakan yang menyebabkan peralihan EDC dan/atau peralatan atau
memberikan izin untuk menjual, mengalihkan, menjaminkan atau dengan cara lain
menyebabkan peralihan Peralatan.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-bottom:0in;mso-add-space:
auto;text-align:justify;text-indent:-.5in;line-height:normal;mso-list:l24 level1 lfo13;
tab-stops:13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Acquirer berhak sewaktu – waktu memeriksa EDC dan/atau Peralatan tanpa
harus menyampaikan pemberitahuan terlebih dahulu kepada Merchant. <o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l24 level1 lfo13;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">Apabila terjadi kerusakan atau kehilangan pada EDC dan /
atau Peralatan, Merchant wajib menghubungi Acquirer dalam waktu 1 x 24 jam.
Apabila kerusakan<span style="letter-spacing:-.35pt"> </span>pada<span style="letter-spacing:-.3pt"> </span>EDC<span style="letter-spacing:-.25pt"> </span>disebabkan<span style="letter-spacing:-.3pt"> </span>oleh<span style="letter-spacing:-.3pt"> </span>kelalaian<span style="letter-spacing:-.3pt"> </span>Merchant,<span style="letter-spacing:-.3pt">
</span>termasuk<span style="letter-spacing:-.3pt"> </span>tetapi<span style="letter-spacing:-.3pt"> </span>tidak<span style="letter-spacing:-.3pt"> </span>terbatas<span style="letter-spacing:-.3pt"> </span>pada<span style="letter-spacing:-.35pt"> </span>pegawainya<span style="letter-spacing:-.3pt"> </span>dan/atau<span style="letter-spacing:-.3pt">
</span>agennya,<span style="letter-spacing:-.3pt"> </span>Merchant<span style="letter-spacing:-.3pt"> </span>harus<span style="letter-spacing:-.3pt"> </span>membayar
segala biaya yang timbul sebagaimana disebutkan didalam Pasal 5 Perjanjian ini.
Baik secara langsung maupun tidak langsung dengan perbaikan, penggantian dan
pemasangan ulang Peralatan dan /atau EDC oleh<span style="letter-spacing:-1.2pt">&nbsp; </span>Acquirer.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoNormal" style="margin-bottom:0in;line-height:normal;tab-stops:13.5pt"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal;tab-stops:13.5pt"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">GANTI RUGI<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l13 level1 lfo14;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">Merchant menyanggupi untuk mengganti rugi, menanggung
secara penuh dan melindungi Acquirer sepanjang diijinkan berdasarkan undang-undang
terhadap setiap dan seluruh kerugian yang dari waktu ke waktu ditanggung,
diadakan atau diderita oleh Acquirer yang timbul dari atau sehubungan dengan
pelanggaran dan atau kelalaian merchant terhadap tanggung jawab dan
kewajibannya yang diatur dalam Perjanjian<span style="letter-spacing:-1.9pt"> </span>ini;
</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-list:l13 level1 lfo14;tab-stops:
13.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp; </span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">Bila<span style="letter-spacing:-.25pt"> </span>terjadi<span style="letter-spacing:-.25pt"> </span>kehilangan<span style="letter-spacing:
-.25pt"> </span>dan/atau<span style="letter-spacing:-.25pt"> </span>kerusakan<span style="letter-spacing:-.25pt"> </span>EDC<span style="letter-spacing:-.2pt"> </span>maka<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.25pt">
</span>wajib<span style="letter-spacing:-.2pt"> </span>membayar<span style="letter-spacing:-.25pt"> </span>ganti<span style="letter-spacing:-.25pt">
</span>rugi<span style="letter-spacing:-.2pt"> </span>selambat<span style="letter-spacing:-.25pt"> </span>–<span style="letter-spacing:-.25pt"> </span>lambatnya<span style="letter-spacing:-.25pt"> </span>30<span style="letter-spacing:-.25pt"> </span>(tiga<span style="letter-spacing:-.2pt"> </span>puluh)<span style="letter-spacing:-.25pt">
</span>hari<span style="letter-spacing:-.25pt"> </span>kalender<span style="letter-spacing:-.25pt"> </span>sejak tanggal kehilangan atau kerusakan<span style="letter-spacing:-.25pt"> </span>sebesar:</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-bottom:0in;mso-add-space:
auto;text-align:justify;text-indent:-.5in;mso-text-indent-alt:-9.0pt;
line-height:normal;mso-pagination:none;mso-list:l6 level1 lfo2;tab-stops:82.7pt;
text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri"><span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>I.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">EDC Dial Up adalah sebesar
Rp. 2.500.000,- ( dua juta lima ratus ribu rupiah ) per EDC Dial Up ;<span style="letter-spacing:-.75pt"> </span>atau</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:.5pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.5in;mso-text-indent-alt:-9.0pt;line-height:normal;mso-pagination:
none;mso-list:l6 level1 lfo2;tab-stops:82.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri"><span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span>II.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">EDC GPRS adalah sebesar
Rp. 3.500.000,- ( empat juta lima ratus ribu rupiah ) per EDC<span style="letter-spacing:-.8pt"> </span>GPRS.</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoNormal" style="margin-bottom:0in;text-align:justify;line-height:
normal;mso-pagination:none;tab-stops:82.7pt;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal;mso-pagination:none;tab-stops:82.7pt;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-bottom:0in;text-align:center;
line-height:normal;mso-pagination:none;tab-stops:82.7pt;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">PROSEDUR TRANSAKSI<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:.5pt;margin-right:0in;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:normal;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:82.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Pada saat melakukan
Transaksi, maka Merchant wajib memperhatikan hal-hal sebagai<span style="letter-spacing:-.85pt"> </span>berikut:</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">a)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Melakukan pemeriksaan
fisik<span style="letter-spacing:-.2pt"> </span>Kartu.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">b)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant tidak
diperkenankan mengulangi transaksi apabila pada layar Mesin peralatan belum ada<span style="letter-spacing:-1.15pt"> </span>respon.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.05pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">c)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Mencocokkan/memeriksa
nomor yang tertera pada fisik Kartu dengan nomor Kartu yang muncul dilayar<span style="letter-spacing:-1.25pt"> </span>peralatan.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.7pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">d)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Memeriksa nominal
transaksi baik sebelum maupun sesudah di input kedalam<span style="letter-spacing:
-.7pt"> </span>EDC.</span><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">e)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Memeriksa tandatangan yang
tertera pada panel tandatangan Kartu dengan yang muncul pada layar EDC dan /
atau Sales Slip.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:34.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">f)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">&nbsp;Memastikan bahwa Kartu dalam keadaan baik dan
memuat keterangan yang ditentukan oleh Bank dari waktu<span style="letter-spacing:
-1.4pt"> &nbsp;&nbsp;</span>ke waktu.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.7pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">g)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Transaksi dilakukan selama
masa berlakunya<span style="letter-spacing:-.3pt"> </span>Kartu.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l22 level1 lfo3;
tab-stops:37.7pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">h)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Memastikan<span style="letter-spacing:-.35pt"> </span>bahwa<span style="letter-spacing:-.5pt"> </span>Transaksi<span style="letter-spacing:-.3pt"> </span>tidak<span style="letter-spacing:-.35pt"> </span>dapat<span style="letter-spacing:-.35pt"> </span>dipergunakan<span style="letter-spacing:
-.3pt"> </span>untuk<span style="letter-spacing:-.35pt"> </span>hal-hal<span style="letter-spacing:-.35pt"> </span>yang<span style="letter-spacing:-.35pt"> </span>bertentangan<span style="letter-spacing:-.35pt"> </span>dengan<span style="letter-spacing:-.35pt">
</span>hukum<span style="letter-spacing:-.35pt"> </span>atau<span style="letter-spacing:-.35pt"> </span>peraturan<span style="letter-spacing:
-.3pt"> </span>pemerintah<span style="letter-spacing:-.35pt"> </span>atau<span style="letter-spacing:-.35pt"> </span>hal-hal lain yang tidak sesuai dengan
Ketentuan Umum<span style="letter-spacing:-.35pt"> </span>ini.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><v:shape id="_x0000_s1027" style="position:absolute;
 left:0;text-align:left;margin-left:.2pt;margin-top:.1pt;width:611.8pt;
 height:14in;z-index:-251656192;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Merchant tidak diperkenakan memecah satu
Transaksi <span style="color:#020303">Pemegang Kartu menjadi beberapa transaksi
(split transaction) dengan menggunakan dua lembar<span style="letter-spacing:
-.25pt"> </span>atau<span style="letter-spacing:-.25pt"> </span>lebih<span style="letter-spacing:-.25pt"> </span>Sales<span style="letter-spacing:-.15pt">
</span>Slip<span style="letter-spacing:-.2pt"> </span>untuk<span style="letter-spacing:-.25pt"> </span>transaksi<span style="letter-spacing:
-.2pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>sama.<span style="letter-spacing:-.25pt"> </span>Segala<span style="letter-spacing:-.2pt">
</span>dan<span style="letter-spacing:-.2pt"> </span>tiap-tiap<span style="letter-spacing:-.25pt"> </span>kerugian<span style="letter-spacing:-.25pt">
</span>yang<span style="letter-spacing:-.2pt"> </span>mungkin<span style="letter-spacing:-.25pt"> </span>diderita<span style="letter-spacing:-.25pt">
</span>oleh<span style="letter-spacing:-.7pt"> </span>Acquirer<span style="letter-spacing:-.15pt"> </span>dan/atau<span style="letter-spacing:-.25pt">
</span>Penerbit<span style="letter-spacing:-.2pt"> </span>kartu dan / atau UP
akibat dilakukan split transaction dimaksud, sepenuhnya menjadi beban dan
tanggung jawab Merchant.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri">Jika karena <span style="color:#020303">alasan tertentu, Pemegang Kartu membatalkan transaksinya
yang sudah terjadi di Merchant pada hari yang sama dengan tanggal transaksi
atau sebelum settlement, maka pihak Merchant wajib memproses “void” melalui<span style="letter-spacing:-.65pt"> </span>EDC.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri">Merchant <span style="color:#020303">wajib memberikan kepada Pemegang Kartu salinan dari Sales
Slip dan/atau Credit Slip (sesuai keperluan) yang diperuntukkan bagi Pemegang
Kartu. Merchant yang melakukan transaksi harus meminta pemegang kartu
memasukkan nomor pin Pemegang Kartu (kecuali diatur lain) pada Pin Pad dan /
atau tanda tangan Pemegang<span style="letter-spacing:-.35pt"> </span>Kartu.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><v:shape id="_x0000_s1026" style="position:absolute;
 left:0;text-align:left;margin-left:.2pt;margin-top:.1pt;width:611.8pt;
 height:14in;z-index:-251657216;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><v:shape id="_x0000_s1028" style="position:absolute;left:0;
 text-align:left;margin-left:.1pt;margin-top:-.3pt;width:612.2pt;height:1008.9pt;
 z-index:-251633664;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Dalam pelaksanaan <span style="color:#020303">Perjanjian<span style="letter-spacing:-.2pt"> </span>ini,<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.3pt">
</span>sepakat<span style="letter-spacing:-.25pt"> </span>untuk<span style="letter-spacing:-.25pt"> </span>tunduk<span style="letter-spacing:-.25pt">
</span>pada<span style="letter-spacing:-.25pt"> </span>ketentuan<span style="letter-spacing:-.3pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>ditetapkan<span style="letter-spacing:-.25pt"> </span>oleh<span style="letter-spacing:-.25pt"> </span>Penerbit<span style="letter-spacing:-.2pt"> </span>Kartu,<span style="letter-spacing:-.75pt">
</span>Acquirer<span style="letter-spacing:-.2pt"> </span>dan/atau<span style="letter-spacing:-.25pt"> </span>ketentuan lain yang berkaitan dengan
Perjanjian yang dapat berubah sewaktu - waktu dan oleh karenanya setiap
perubahan terhadapnya akan disampaikan secara tertulis oleh Acquirer kepada<span style="letter-spacing:-.85pt"> </span>Merchant.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.5in;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">6.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant
wajib memberikan pelayanan yang baik kepada Pemegang Kartu yang akan melakukan
transaksi di Tempat Usaha Merchant.</span><span style="font-size:9.0pt;
line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">7.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant
setuju untuk<span style="letter-spacing:-.3pt"> </span>memproses<span style="letter-spacing:-.4pt"> </span>Transaksi<span style="letter-spacing:-.2pt">
</span>dari<span style="letter-spacing:-.3pt"> </span>Pemegang<span style="letter-spacing:-.2pt"> </span>Kartu<span style="letter-spacing:-.25pt"> </span>dengan<span style="letter-spacing:-.25pt"> </span>menggunakan<span style="letter-spacing:
-.25pt"> </span>Kartu<span style="letter-spacing:-.25pt"> </span>di<span style="letter-spacing:-.4pt"> </span><span style="letter-spacing:-.25pt">Tempat
</span>Usaha<span style="letter-spacing:-.25pt"> </span>Merchant,<span style="letter-spacing:-.25pt"> </span>setelah<span style="letter-spacing:-.3pt">
</span>Merchant<span style="letter-spacing:-.25pt"> </span>terlebih dahulu menjalankan
prosedur yang harus dipatuhi sebelum memproses transaksi, sebagaimana
ditetapkan oleh UP maupun sebagaimana diatur dalam Perjanjian ini.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l19 level1 lfo15;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">8.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Dalam
menerima<span style="letter-spacing:-.4pt"> </span>Transaksi,<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.25pt">
</span>setuju<span style="letter-spacing:-.3pt"> </span>untuk<span style="letter-spacing:-.25pt"> </span>memberikan<span style="letter-spacing:
-.25pt"> </span>harga<span style="letter-spacing:-.3pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>sama<span style="letter-spacing:-.3pt"> </span>kepada<span style="letter-spacing:-.25pt"> </span>para<span style="letter-spacing:-.25pt"> </span>Pemegang<span style="letter-spacing:-.25pt"> </span>kartu<span style="letter-spacing:-.25pt">
</span>dan<span style="letter-spacing:-.3pt"> </span>tidak<span style="letter-spacing:-.25pt"> </span>akan<span style="letter-spacing:-.3pt"> </span>mengenakan<span style="letter-spacing:-.25pt"> </span>biaya &nbsp;&nbsp;tambahan dalam bentuk apapun serta tidak akan
mengenakan batas minimum<span style="letter-spacing:-.9pt"> </span>Transaksi.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:13.5pt;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:13.5pt;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:13.5pt;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">PENAMBAHAN FASILITAS UNTUK TRANSAKSI KEY – IN DAN CARDVER OFFLINE<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:13.5pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l14 level1 lfo16;
tab-stops:13.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri">Transaksi <span style="color:#020303">Key In dan transaksi Cardver-offline merupakan fasilitas
tambahan yang dapat diberikan kepada Merchant yang mengajukan fasilitas
tambahan tersebut kepada Acquirer dan hanya dapat diberlakukan untuk Kartu
Kredit Union <span style="letter-spacing:-.2pt">Pay. </span>Untuk memperoleh
tambahan fasilitas transaksi tersebut,<span style="letter-spacing:-.4pt"> </span>Merchant<span style="letter-spacing:-.35pt"> </span>harus<span style="letter-spacing:-.35pt">
</span>mengajukan<span style="letter-spacing:-.35pt"> </span>permohonan<span style="letter-spacing:-.35pt"> </span>penambahan<span style="letter-spacing:
-.35pt"> </span>fasilitas<span style="letter-spacing:-.35pt"> </span>transaksi<span style="letter-spacing:-.35pt"> </span>kepada<span style="letter-spacing:-.85pt">
</span>Acquirer<span style="letter-spacing:-.3pt"> </span>dengan<span style="letter-spacing:-.35pt"> </span>mengisi<span style="letter-spacing:-.35pt">
</span>formulir<span style="letter-spacing:-.35pt"> </span>yang<span style="letter-spacing:-.35pt"> </span>akan<span style="letter-spacing:-.35pt"> </span>disediakan
oleh Acquirer, dan senantiasa menyanggupi untuk melakukan hal-hal sebagai
berikut<span style="letter-spacing:-1.4pt"> </span>:</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:5.0pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l27 level1 lfo4;
tab-stops:50.2pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">a)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Untuk tambahan Fasilitas
Key<span style="letter-spacing:-.1pt"> </span>In:</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l15 level1 lfo5;
tab-stops:72.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">1)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant
harus memiliki data dan dokumen pendukung seperti surat pemesanan dari Pemegang
Kartu, surat konfirmasi pemesanan dari Merchant dengan mencantumkan informasi
harga barang dan/atau jasa serta syarat dan ketentuan<span style="letter-spacing:
-1.4pt"> </span>pembelian.</span><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l15 level1 lfo5;
tab-stops:58.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">2)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Transaksi<span style="letter-spacing:-.3pt"> </span>yang<span style="letter-spacing:-.3pt"> </span>akan<span style="letter-spacing:-.3pt"> </span>dilakukan<span style="letter-spacing:-.3pt">
</span>harus<span style="letter-spacing:-.3pt"> </span>mendapatkan<span style="letter-spacing:-.3pt"> </span>persetujuan<span style="letter-spacing:
-.3pt"> </span>terlebih<span style="letter-spacing:-.3pt"> </span>dahulu<span style="letter-spacing:-.3pt"> </span>dari<span style="letter-spacing:-.3pt"> </span>Pemegang<span style="letter-spacing:-.25pt"> </span>Kartu,<span style="letter-spacing:-.25pt">
</span>yang<span style="letter-spacing:-.3pt"> </span>dibuktikan<span style="letter-spacing:-.3pt"> </span>dengan<span style="letter-spacing:-.3pt"> </span>adanya<span style="letter-spacing:-.3pt"> </span>data dan / atau dokumen pendukung yang
telah ditanda tangani oleh Pemegang<span style="letter-spacing:-.75pt"> </span>Kartu.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:12.2pt;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:22.5pt;line-height:105%;mso-pagination:none;mso-list:l15 level1 lfo5;
tab-stops:72.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">3)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Dalam
menjalani proses Key In Merchant harus mematuhi ketentuan yang telah ditetapkan
oleh<span style="letter-spacing:-1.3pt"> </span>UnionPay.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.6pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:22.5pt;line-height:normal;mso-pagination:none;mso-list:l15 level1 lfo5;
tab-stops:72.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">4)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Tidak dapat digunakan
untuk transaksi<span style="letter-spacing:-.35pt"> </span>membership</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.7pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l27 level1 lfo4;
tab-stops:47.0pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">b)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Untuk tambahan Fasilitas<span style="letter-spacing:-.1pt"> </span>Cardver-offline:</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:72.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">1)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Transaksi<span style="letter-spacing:-.35pt"> </span>Card-Ver<span style="letter-spacing:-.35pt">
</span>merupakan<span style="letter-spacing:-.35pt"> </span>proses<span style="letter-spacing:-.35pt"> </span>otorisasi<span style="letter-spacing:
-.35pt"> </span>yang<span style="letter-spacing:-.35pt"> </span>dilakukan<span style="letter-spacing:-.35pt"> </span>oleh<span style="letter-spacing:-.4pt"> </span>Merchant<span style="letter-spacing:-.35pt"> </span>atas<span style="letter-spacing:-.35pt"> </span>sejumlah<span style="letter-spacing:-.35pt"> </span>nilai<span style="letter-spacing:-.35pt">
</span>yang<span style="letter-spacing:-.35pt"> </span>diperkirakan<span style="letter-spacing:-.35pt"> </span>akan<span style="letter-spacing:-.35pt"> </span>digunakan<span style="letter-spacing:-.35pt"> </span>oleh Pemegang Kartu (deposit);</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:71.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">2)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Apabila
tagihan mount mendekati limit pada cardver yang pertama maka dapat dilakukan
dengan cardver yang kedua dengan perkiraaan jumlah nominal yang lebih dari 15%
dari cardver<span style="letter-spacing:-.55pt"> </span>sebelumnya;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:21.95pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:71.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">3)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Khusus<span style="letter-spacing:-.1pt"> </span>untuk<span style="letter-spacing:-.15pt"> </span>tamu<span style="letter-spacing:-.15pt"> </span>long<span style="letter-spacing:-.15pt"> </span>stay<span style="letter-spacing:-.15pt"> </span>(lebih<span style="letter-spacing:-.05pt">
</span>dari<span style="letter-spacing:-.15pt"> </span>25<span style="letter-spacing:-.15pt"> </span>hari),<span style="letter-spacing:-.15pt">
</span>maka<span style="letter-spacing:-.15pt"> </span>settlement<span style="letter-spacing:-.1pt"> </span>atas<span style="letter-spacing:-.15pt"> </span>cardver<span style="letter-spacing:-.15pt"> </span>sebelumnya<span style="letter-spacing:
-.15pt"> </span>harus<span style="letter-spacing:-.15pt"> </span>dilakukan<span style="letter-spacing:-.1pt"> </span>sebelum<span style="letter-spacing:-.15pt">
</span>hari<span style="letter-spacing:-.15pt"> </span>ke<span style="letter-spacing:-.15pt"> </span>25;</span><span style="font-size:9.0pt;
line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.6pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:72.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">4)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Transaksi
Card <span style="letter-spacing:-.25pt">Ver </span>– Offline Key In harus
menggunakan kode otorisasi yang diperoleh melalui CardVer dengan ketentuan
tidak melebihi 15% (lima belas persen) dari jumlah Card-Ver yang dijelaskan
pada Pasal 8 poin<span style="letter-spacing:-1.0pt"> </span>1.b.1</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.6pt;margin-right:.35in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:22.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:72.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">5)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Apabila
ada selisih jumlah Transaksi maka kelebihan selisih tersebut harus mendapatkan
kode otorisasi baru;</span><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:1.0in 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">6)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Slip
Offline Key In tidak memerlukan tandatangan Pemegang Kartu tapi harus
dilengkapi dengan dokumen dokumen/ identitas dari pemilik kartu kredit sesuai
persyaratan dari principal<span style="letter-spacing:-.4pt"> </span>(UnionPay);</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:18.8pt;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:22.5pt;line-height:105%;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:72.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">7)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Slip<span style="letter-spacing:-.35pt"> </span>Offline<span style="letter-spacing:-.3pt">
</span>Sale<span style="letter-spacing:-.3pt"> </span>layaknya<span style="letter-spacing:-.35pt"> </span>pemrosesan<span style="letter-spacing:
-.35pt"> </span>seperti<span style="letter-spacing:-.35pt"> </span>transaksi<span style="letter-spacing:-.35pt"> </span>biasa<span style="letter-spacing:-.35pt">
</span>dimana<span style="letter-spacing:-.35pt"> </span>slip<span style="letter-spacing:-.35pt"> </span>harus<span style="letter-spacing:-.35pt">
</span>ditandatangani<span style="letter-spacing:-.35pt"> </span>oleh<span style="letter-spacing:-.35pt"> </span>pemegang<span style="letter-spacing:-.35pt">
</span>kartu<span style="letter-spacing:-.3pt"> </span>kredit;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.7pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:22.5pt;line-height:normal;mso-pagination:none;mso-list:l8 level1 lfo6;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">8)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Dalam<span style="letter-spacing:-.3pt"> </span>menjalani<span style="letter-spacing:-.3pt">
</span>proses<span style="letter-spacing:-.35pt"> </span>Card<span style="letter-spacing:-.25pt"> </span><span style="letter-spacing:-.2pt">Ver–</span><span style="letter-spacing:-.35pt"> </span>Offline<span style="letter-spacing:-.3pt">
</span>Sale<span style="letter-spacing:-.3pt"> </span>Merchant<span style="letter-spacing:-.3pt"> </span>harus<span style="letter-spacing:-.35pt"> </span>mematuhi<span style="letter-spacing:-.3pt"> </span>ketentuan<span style="letter-spacing:-.35pt">
</span>yang<span style="letter-spacing:-.3pt"> </span>telah<span style="letter-spacing:-.35pt"> </span>ditetapkan<span style="letter-spacing:
-.3pt"> </span>oleh<span style="letter-spacing:-.3pt"> </span>UnionPay.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.5in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l27 level1 lfo4;
tab-stops:46.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">c)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Kewajiban Merchant yang
memperoleh fasilitas<span style="letter-spacing:-.25pt"> </span>:</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l2 level1 lfo7;
tab-stops:69.35pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">1)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">&nbsp;Merchant wajib memberikan dokumen/bukti/sales
slip yang ditandatangani oleh Pemegang Kartu kepada Acquirer (jika diminta)
dalam hal Pemegang<span style="letter-spacing:-.25pt"> </span>Kartu<span style="letter-spacing:-.25pt"> </span>menyanggah/tidak<span style="letter-spacing:
-.3pt"> </span>mengakui<span style="letter-spacing:-.25pt"> </span>adanya<span style="letter-spacing:-.3pt"> </span>transaksi<span style="letter-spacing:-.3pt">
</span>pada<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.3pt"> </span>paling<span style="letter-spacing:-.3pt"> </span>lambat<span style="letter-spacing:-.25pt"> </span>7<span style="letter-spacing:-.3pt"> </span>(tujuh)<span style="letter-spacing:-.25pt"> </span>hari<span style="letter-spacing:-.25pt"> </span>kerja<span style="letter-spacing:-.3pt"> </span>sejak<span style="letter-spacing:-.3pt"> </span>tanggal<span style="letter-spacing:-.25pt"> </span>permintaan dokumen oleh<span style="letter-spacing:-.75pt"> </span>Acquirer;</span><span style="font-size:
9.0pt;line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l2 level1 lfo7;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">2)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Apabila
timbul keluhan/sanggahan dari Pemegang Kartu dan/atau Bank Penerbit Kartu atas
transaksi tersebut dengan alasan apapun juga, maka Acquirer akan
langsung/segera melakukan Chargeback terhadap Merchant atas transaksi <span style="letter-spacing:-1.4pt">&nbsp;</span>tersebut;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l2 level1 lfo7;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">3)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Apabila
Merchant melakukan pelanggaran / berbuat kecurangan / tidak dapat memberikan
dokumen yang terkait dengan transaksi dengan menggunakan fasilitas key in
dan/atau Card <span style="letter-spacing:-.25pt">Ver </span>– Offline Key In
maka Merchant wajib bertanggung jawab atas segala kerugian Acquirer yang<span style="letter-spacing:-.35pt"> </span>timbul<span style="letter-spacing:-.35pt">
</span>sehubungan<span style="letter-spacing:-.3pt"> </span>dengan<span style="letter-spacing:-.35pt"> </span>tuntutan-tuntutan,<span style="letter-spacing:
-.3pt"> </span>kerugian<span style="letter-spacing:-.35pt"> </span>dan<span style="letter-spacing:-.3pt"> </span>biaya-biaya<span style="letter-spacing:
-.35pt"> </span>yang<span style="letter-spacing:-.35pt"> </span>diderita<span style="letter-spacing:-.3pt"> </span>oleh<span style="letter-spacing:-.8pt"> </span>Acquirer,<span style="letter-spacing:-.3pt"> </span>Pemegang<span style="letter-spacing:-.3pt">
</span>Kartu<span style="letter-spacing:-.3pt"> </span>atau<span style="letter-spacing:-.3pt"> </span>pihak<span style="letter-spacing:-.35pt"> </span>ketiga
dalam pelaksanaan Addendum ini atau kegagalan untuk melaksanakan
ketentuan-ketentuan berdasarkan Addendum ini oleh Merchant termasuk
penyalah-gunaan Kartu oleh Merchant, pihak ketiga, atau Merchant bersama-sama
dengan pihak ketiga, dan sekaligus Acquirer berhak mengakhiri kerjasama dengan
Merchant sesuai dengan ketentuan yang diatur dalam<span style="letter-spacing:
-1.05pt"> </span>Perjanjian;</span><span style="font-size:9.0pt;line-height:
105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l2 level1 lfo7;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">4)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Bersedia
menanggung kerugian akibat selisih nilai mata uang (selisih kurs) apabila
timbul masalah dari Pemegang Kartu / Bank Penerbit Kartu;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l2 level1 lfo7;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">5)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant<span style="letter-spacing:-.25pt"> </span>wajib<span style="letter-spacing:-.2pt"> </span>mengikuti<span style="letter-spacing:-.25pt"> </span>semua<span style="letter-spacing:-.25pt">
</span>ketentuan<span style="letter-spacing:-.25pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>telah<span style="letter-spacing:-.25pt">
</span>diatur<span style="letter-spacing:-.25pt"> </span>oleh<span style="letter-spacing:-.75pt"> </span>Acquirer<span style="letter-spacing:-.2pt">
</span>baik<span style="letter-spacing:-.25pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>telah<span style="letter-spacing:-.25pt">
</span>ada<span style="letter-spacing:-.25pt"> </span>pada<span style="letter-spacing:-.25pt"> </span>saat<span style="letter-spacing:-.25pt"> </span>pendatanganan<span style="letter-spacing:-.75pt"> </span>Addendum<span style="letter-spacing:-.2pt">
</span>ini maupun yang akan ada dikemudian hari yang akan disampaikan kepada<span style="letter-spacing:-.8pt"> </span>Merchant;</span><span style="font-size:
9.0pt;line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l2 level1 lfo7;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">6)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Dalam<span style="letter-spacing:-.25pt"> </span>melakukan<span style="letter-spacing:
-.25pt"> </span>transaksi<span style="letter-spacing:-.25pt"> </span>Key<span style="letter-spacing:-.25pt"> </span>in<span style="letter-spacing:-.25pt"> </span>dan<span style="letter-spacing:-.25pt"> </span>/atau<span style="letter-spacing:-.25pt">
</span>Cardver<span style="letter-spacing:-.2pt"> </span>–<span style="letter-spacing:-.3pt"> </span>Offline<span style="letter-spacing:-.25pt">
</span>merchant<span style="letter-spacing:-.25pt"> </span>wajib<span style="letter-spacing:-.2pt"> </span>menunjuk<span style="letter-spacing:-.3pt">
</span>PIC/Staff<span style="letter-spacing:-.25pt"> </span>beserta<span style="letter-spacing:-.25pt"> </span>backupnya,<span style="letter-spacing:
-.25pt"> </span>dan<span style="letter-spacing:-.3pt"> </span>bertanggung jawab
atas proses yang<span style="letter-spacing:-.25pt"> </span>dilakukan.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:1.0in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:1.0in;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:1.0in;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:1.0in;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">HAL – HAL YANG TIDAK BOLEH DILAKUKAN OLEH MERCHANT<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l18 level1 lfo17;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri">Selama <span style="color:#020303">berlakunya<span style="letter-spacing:-.3pt"> </span>Perjanjian,<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.35pt">
</span>tidak<span style="letter-spacing:-.3pt"> </span>diperkenankan<span style="letter-spacing:-.3pt"> </span>untuk<span style="letter-spacing:-.3pt"> </span>menggunakan<span style="letter-spacing:-.3pt"> </span>EDC<span style="letter-spacing:-.3pt"> </span>untuk<span style="letter-spacing:-.3pt"> </span>menerima<span style="letter-spacing:-.3pt">
</span>transaksi<span style="letter-spacing:-.3pt"> </span>pihak<span style="letter-spacing:-.35pt"> </span>lain,<span style="letter-spacing:-.3pt"> </span>mengalihkan<span style="letter-spacing:-.3pt"> </span>baik sebagian atau seluruh Perjanjian
kepada pihak lain tanpa persetujuan tertulis terlebih dahulu dari<span style="letter-spacing:-1.8pt"> </span>Acquirer.</span></span><b><span style="font-size:10.0pt;line-height:
105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l18 level1 lfo17;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Untuk<span style="letter-spacing:-.25pt"> </span>keperluan<span style="letter-spacing:
-.3pt"> </span>pemasangan<span style="letter-spacing:-.3pt"> </span>iklan<span style="letter-spacing:-.3pt"> </span>dan<span style="letter-spacing:-.3pt"> </span>alat-alat<span style="letter-spacing:-.3pt"> </span>promosi,<span style="letter-spacing:-.3pt">
</span>Merchant<span style="letter-spacing:-.3pt"> </span>tidak<span style="letter-spacing:-.3pt"> </span>diperkenankan<span style="letter-spacing:
-.3pt"> </span>mencantumkan<span style="letter-spacing:-.3pt"> </span>logo<span style="letter-spacing:-.3pt"> </span>Penerbit<span style="letter-spacing:-.25pt">
</span>Kartu<span style="letter-spacing:-.25pt"> </span>dan/atau<span style="letter-spacing:-.3pt"> </span>UP<span style="letter-spacing:-.3pt"> </span>tanpa
persetujuan tertulis terlebih dahulu dari Penerbit Kartu dan/atau<span style="letter-spacing:-1.05pt"> </span>Acquirer.</span><b><span style="font-size:10.0pt;line-height:105%;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l18 level1 lfo17;
tab-stops:1.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant
tidak diperkenankan<span style="letter-spacing:-.2pt"> </span>untuk:</span><b><span style="font-size:10.0pt;line-height:
105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.6pt;margin-right:0in;
margin-bottom:0in;margin-left:31.5pt;mso-add-space:auto;text-align:justify;
text-indent:0in;line-height:normal;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">a)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Melakukan<span style="letter-spacing:-.35pt"> </span>Transaksi<span style="letter-spacing:
-.1pt"> </span>milik<span style="letter-spacing:-.2pt"> </span>Merchant<span style="letter-spacing:-.15pt"> </span>dan/atau<span style="letter-spacing:-.2pt">
</span>afiliasinya<span style="letter-spacing:-.15pt"> </span>di<span style="letter-spacing:-.2pt"> </span>tempat<span style="letter-spacing:-.15pt">
</span>usahanya<span style="letter-spacing:-.2pt"> </span>sendiri<span style="letter-spacing:-.15pt"> </span>meskipun<span style="letter-spacing:-.2pt">
</span>Merchant<span style="letter-spacing:-.15pt"> </span>juga<span style="letter-spacing:-.2pt"> </span>sebagai<span style="letter-spacing:-.15pt">
</span>Pemegang<span style="letter-spacing:-.15pt"> </span>Kartu;</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">b)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Menerima transaksi titipan
dari toko atau Merchant<span style="letter-spacing:-.45pt"> </span>lain;</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:45.0pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">c)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Menjual<span style="letter-spacing:-.35pt"> </span>barang<span style="letter-spacing:-.35pt">
</span>atau<span style="letter-spacing:-.3pt"> </span>jasa<span style="letter-spacing:-.35pt"> </span>yang<span style="letter-spacing:-.35pt"> </span>bertentangan<span style="letter-spacing:-.3pt"> </span>dengan<span style="letter-spacing:-.35pt">
</span>hukum<span style="letter-spacing:-.35pt"> </span>dan/atau<span style="letter-spacing:-.3pt"> </span>menjadikan<span style="letter-spacing:
-.35pt"> </span>uang<span style="letter-spacing:-.35pt"> </span>sebagai<span style="letter-spacing:-.3pt"> </span>obyek<span style="letter-spacing:-.45pt"> </span>Transaksi<span style="letter-spacing:-.3pt"> </span>sebagaimana<span style="letter-spacing:
-.3pt"> </span>diatur<span style="letter-spacing:-.35pt"> </span>didalam
Lampiran 2 Perjanjian<span style="letter-spacing:-.15pt"> </span>ini;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:27.45pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">d)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Membebankan
biaya tambahan kepada Pemegang Kartu yang melakukan<span style="letter-spacing:
-.6pt"> </span>Transaksi;</span><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:27.45pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">e)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Membuat
Sales Slip yang hanya mencatat sebagian dari jumlah total<span style="letter-spacing:-.7pt"> </span>Transaksi;</span><span style="font-size:
9.0pt;line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:27.45pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">f)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merubah
jumlah Transaksi pada<span style="letter-spacing:-.35pt"> </span>EDC;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:27.45pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">g)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Menuliskan
mata uang Transaksi pada Notasi Harga dan Sales Slip selain dalam Rupiah<span style="letter-spacing:-.75pt"> </span>(Rp);</span><span style="font-size:9.0pt;
line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:27.45pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">h)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Berpindah
lokasi usaha tanpa melakukan pemberitahuan kepada Acquirer, baik secara lisan
maupun<span style="letter-spacing:-1.65pt"> </span>tertulis;</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:27.45pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">i)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Memindahkan
Peralatan tanpa pemberitahuan terlebih dahulu kepada<span style="letter-spacing:
-1.0pt"> </span>Acquirer;</span><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:45.0pt;mso-add-space:auto;text-align:justify;
text-indent:-13.5pt;line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;
tab-stops:43.9pt 571.5pt 8.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">j)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Melakukan<span style="letter-spacing:-.35pt"> </span>tindakan-tindakan<span style="letter-spacing:
-.35pt"> </span>lainnya<span style="letter-spacing:-.35pt"> </span>yang<span style="letter-spacing:-.35pt"> </span>melanggar<span style="letter-spacing:
-.3pt"> </span>ketentuan<span style="letter-spacing:-.35pt"> </span>sebagaimana<span style="letter-spacing:-.35pt"> </span>ditetapkan<span style="letter-spacing:
-.35pt"> </span>oleh<span style="letter-spacing:-.35pt"> </span>Union<span style="letter-spacing:-.3pt"> </span>Pay<span style="letter-spacing:-.25pt"> </span>dan/atau<span style="letter-spacing:-.8pt"> </span>Acquirer<span style="letter-spacing:-.3pt">
</span>terkait<span style="letter-spacing:-.35pt"> </span>dengan pemrosesan
dan/atau pelaksanaan Transaksi termasuk melakukan transaksi tarik<span style="letter-spacing:-.8pt"> </span>tunai;</span><span style="font-size:9.0pt;
line-height:105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:49.5pt;mso-add-space:auto;text-indent:-.25in;
line-height:105%;mso-pagination:none;mso-list:l28 level1 lfo8;tab-stops:43.9pt;
text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;
line-height:105%;mso-ascii-font-family:Calibri;mso-fareast-font-family:Calibri;
mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">k)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Melakukan<span style="letter-spacing:-.2pt"> </span>transaksi<span style="letter-spacing:-.15pt">
</span>pembayaran<span style="letter-spacing:-.15pt"> </span>dengan<span style="letter-spacing:-.15pt"> </span>menggesekkan<span style="letter-spacing:
-.15pt"> </span>Kartu<span style="letter-spacing:-.1pt"> </span>Debit<span style="letter-spacing:-.1pt"> </span>/<span style="letter-spacing:-.15pt"> </span>Kredit<span style="letter-spacing:-.1pt"> </span>ke<span style="letter-spacing:-.15pt"> </span>EDC<span style="letter-spacing:-.1pt"> </span>dan<span style="letter-spacing:-.15pt"> </span>cash<span style="letter-spacing:-.15pt"> </span>register<span style="letter-spacing:-.1pt">
</span>atau<span style="letter-spacing:-.15pt"> </span>POS<span style="letter-spacing:-.1pt"> </span>Merchant<span style="letter-spacing:-.2pt">
</span>(double<span style="letter-spacing:-.1pt"> </span>swipe).</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l9 level1 lfo18;
tab-stops:.25in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><v:shape id="_x0000_s1029" style="position:absolute;
 left:0;text-align:left;margin-left:-.15pt;margin-top:-.25pt;width:612.45pt;
 height:1008.25pt;z-index:-251632640;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Merchant <span style="color:#020303">tidak
diperkenankan untuk menambah, merubah, memodifikasi, melakukan penyambungan
dengan alat ataupun sarana lainnya dan / atau merusak program pada Peralatan
dan/atau EDC tanpa persetujuan dari Acquirer, yang atas pelanggarannya tersebut
Merchant wajib ber - tanggung jawab sesuai ketentuan dalam Perjanjian<span style="letter-spacing:-.35pt"> </span>ini.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:105%;mso-pagination:none;mso-list:l9 level1 lfo18;
tab-stops:.25in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-fareast-font-family:Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:
Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;line-height:105%;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant
dalam keadaan apapun, dilarang memberikan kepada pihak lain keterangan atau
data Pemegang Kartu dan/atau Penerbit Kartu, termasuk tetapi tidak terbatas
pada nama Pemegang Kartu, nomor Kartu kecuali kepada Penerbit Kartu, serta
wajib menjaga dan / atau menyimpan kerahasiaanya sebagaimana dimaksud dalam
Undang - Undang Nomor 10 <span style="letter-spacing:-.3pt">Tahun </span>1998
tentang perubahan atas Undang<span style="letter-spacing:-2.25pt"> &nbsp;&nbsp;</span>-Undang No. 7 Tahun 1992 tentang
Perbankan berikut peraturan pelaksanaannya dan Perubahan-perubahannya
dikemudian hari yang ditetapkan oleh instansi Pemerintah yang berwenang.</span><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-1.8pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l9 level1 lfo18;
tab-stops:.25in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">6.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Apabila<span style="letter-spacing:-.2pt"> </span>Merchant<span style="letter-spacing:-.25pt">
</span>melanggar<span style="letter-spacing:-.25pt"> </span>satu<span style="letter-spacing:-.25pt"> </span>atau<span style="letter-spacing:-.25pt"> </span>lebih<span style="letter-spacing:-.25pt"> </span>syarat<span style="letter-spacing:-.25pt">
</span>dan<span style="letter-spacing:-.2pt"> </span>ketentuan<span style="letter-spacing:-.25pt"> </span>sebagaimana<span style="letter-spacing:
-.25pt"> </span>diatur<span style="letter-spacing:-.25pt"> </span>dalam<span style="letter-spacing:-.25pt"> </span>ayat<span style="letter-spacing:-.25pt"> </span>1<span style="letter-spacing:-.25pt"> </span>sampai<span style="letter-spacing:-.2pt">
</span>6<span style="letter-spacing:-.25pt"> </span>Pasall<span style="letter-spacing:-.2pt"> </span>ini,<span style="letter-spacing:-.75pt"> </span>Acquirer<span style="letter-spacing:-.15pt"> </span>akan<span style="letter-spacing:-.25pt"> </span>memberikan
suatu peringatan kepada Merchant dengan disertai atau tidak disertai oleh
sanksi lainnya seperti, termasuk tetapi tidak terbatas pada memutuskan
sementara layanan pemrosesan<span style="letter-spacing:-.2pt"> </span>transaksi.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-1.8pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:.25in;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">&nbsp;</span></p>

<p class="MsoListParagraphCxSpMiddle" align="center" style="margin-top:0in;
margin-right:27.45pt;margin-bottom:0in;margin-left:.25in;mso-add-space:auto;
text-align:center;line-height:normal;mso-pagination:none;tab-stops:.25in;
text-autospace:none"><br></p>

<p class="MsoListParagraphCxSpMiddle" align="center" style="margin-top:0in;
margin-right:27.45pt;margin-bottom:0in;margin-left:.25in;mso-add-space:auto;
text-align:center;line-height:normal;mso-pagination:none;tab-stops:.25in;
text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">BIAYA ADMINISTRASI<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:5.0pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l0 level1 lfo9;
tab-stops:.25in 371.55pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Merchant <span style="color:#020303">Merchant
setuju untuk dikenakan biaya administrasi (“Merchant Discount Rate” atau “MDR”)
yang diperhitungkan dari setiap total jumlah transaksi kartu <span style="letter-spacing:-.5pt">UP. </span>Besarnya MDR untuk <span style="letter-spacing:-.25pt">Tempat </span>Usaha<span style="letter-spacing:
-.4pt"> </span>Merchant<span style="letter-spacing:-.15pt"> </span>adalah 2,5
%.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:5.0pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l0 level1 lfo9;
tab-stops:.25in 371.55pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Setiap<span style="letter-spacing:-.2pt"> </span>transaksi<span style="letter-spacing:-.2pt">
</span>yang<span style="letter-spacing:-.2pt"> </span>terjadi<span style="letter-spacing:-.25pt"> </span>pada<span style="letter-spacing:-.2pt"> </span>hari<span style="letter-spacing:-.2pt"> </span>Senin<span style="letter-spacing:-.2pt"> </span>sampai<span style="letter-spacing:-.2pt"> </span>dengan<span style="letter-spacing:-.2pt"> </span>hari<span style="letter-spacing:-.25pt"> </span>kamis,<span style="letter-spacing:-.2pt">
</span>maka<span style="letter-spacing:-.2pt"> </span>pembayaran<span style="letter-spacing:-.25pt"> </span>untuk<span style="letter-spacing:-.2pt"> </span>settlement<span style="letter-spacing:-.2pt"> </span>ke<span style="letter-spacing:-.2pt"> </span>rekening<span style="letter-spacing:-.2pt"> </span>Bank<span style="letter-spacing:-.15pt"> </span>rekanan<span style="letter-spacing:-.65pt"> </span>Acquirer akan dilakukan
selambat-lambatnya 1 (satu) hari kerja sejak transaksi, sedangkan pembayaran
untuk settlement ke rekening bank lain maka pembayaran akan dilakukan 2 (dua)
hari kerja sejak<span style="letter-spacing:-.5pt"> </span>transaksi.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:5.0pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l0 level1 lfo9;
tab-stops:.25in 371.55pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Setiap transaksi yang
terjadi pada hari Jumat, Sabtu dan Minggu, maka pembayaran kepada Merchant akan
dilaksanakan pada hari Senin. Setiap transaksi yang dilakukan pada hari libur
yang telah ditetapkan oleh Pemerintah Republik Indonesia maupun pemerintah Republik
China, maka pembayaran kepada Merchant akan dilakukan pada hari berikutnya yang
merupakan hari<span style="letter-spacing:-.95pt"> </span>kerja.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:5.0pt;margin-right:27.5pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l0 level1 lfo9;
tab-stops:.25in 371.55pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Pembayaran akan dilakukan
ke rekening Bank (”Rekening Penyelesaian”) sebagai berikut<span style="letter-spacing:-.4pt"> </span>:</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:0in;margin-bottom:
0in;margin-left:4.5pt;margin-bottom:.0001pt;text-align:justify;text-indent:
13.5pt"><v:shape id="_x0000_s1030" style="position:absolute;left:0;
 text-align:left;margin-left:.15pt;margin-top:.05pt;width:612.45pt;height:1008.25pt;
 z-index:-251631616;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><b><span style="font-size:9.0pt;
font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:#020303">Untuk Merchant</span></b><b><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></b></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:0in;margin-bottom:
0in;margin-left:12.05pt;margin-bottom:.0001pt;text-align:justify;text-indent:
22.35pt"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">&nbsp;Nama Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:0in;margin-bottom:
0in;margin-left:12.05pt;margin-bottom:.0001pt;text-align:justify;text-indent:
22.35pt"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">&nbsp;Kantor Cabang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:0in;margin-bottom:
0in;margin-left:12.05pt;margin-bottom:.0001pt;text-align:justify;text-indent:
23.95pt"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">No. Rekening&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:0in;margin-bottom:
0in;margin-left:.5in;margin-bottom:.0001pt;text-align:justify"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;;color:#020303">Atas Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :<o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9;tab-stops:580.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:
Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Para Pihak dengan ini
sepakat dan menyetujui bahwa perhitungan laporan akumulatif Transaksi yang
dikeluarkan oleh Acquirer adalah perhitungan yang menjadi dasar acuan untuk
pembayaran kepada Merchant oleh<span style="letter-spacing:-1.25pt"> </span>Acquirer.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9;tab-stops:580.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:
Calibri">6.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><v:shape id="_x0000_s1031" style="position:absolute;
 left:0;text-align:left;margin-left:.15pt;margin-top:.05pt;width:612.45pt;
 height:1008.25pt;z-index:-251630592;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Acquirer<span style="letter-spacing:-.25pt"> </span>berhak<span style="letter-spacing:-.25pt">
</span>untuk<span style="letter-spacing:-.25pt"> </span>melakukan<span style="letter-spacing:-.3pt"> </span>koreksi<span style="letter-spacing:-.25pt">
</span>atas<span style="letter-spacing:-.4pt"> </span>Transaksi<span style="letter-spacing:-.2pt"> </span>oleh<span style="letter-spacing:-.3pt"> </span>karena<span style="letter-spacing:-.25pt"> </span>jumlah<span style="letter-spacing:-.25pt">
</span>nilai<span style="letter-spacing:-.3pt"> </span>pembayaran<span style="letter-spacing:-.25pt"> </span>ke<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.3pt"> </span>oleh<span style="letter-spacing:-.75pt"> </span>Acquirer<span style="letter-spacing:-.2pt"> </span>lebih<span style="letter-spacing:-.3pt"> </span>dari<span style="letter-spacing:-.25pt"> </span>atau<span style="letter-spacing:-.25pt"> </span>tidak<span style="letter-spacing:-.3pt"> </span>sesuai dengan jumlah yang tertera pada
laporan yang dikeluarkan oleh<span style="letter-spacing:-1.2pt"> </span>Acquirer.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9;tab-stops:580.5pt"><!--[if !supportLists]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:
Calibri">7.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Apabila<span style="letter-spacing:-.3pt"> </span>terjadi<span style="letter-spacing:-.35pt">
</span>pembatalan<span style="letter-spacing:-.5pt"> </span>Transaksi,<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.35pt">
</span>sesuai<span style="letter-spacing:-.35pt"> </span>kebijakannya<span style="letter-spacing:-.35pt"> </span>akan<span style="letter-spacing:-.3pt"> </span>melakukan<span style="letter-spacing:-.35pt"> </span>pengembalian<span style="letter-spacing:
-.35pt"> </span>dana<span style="letter-spacing:-.35pt"> </span>kepada<span style="letter-spacing:-.3pt"> </span>pemegang<span style="letter-spacing:-.35pt">
</span>kartu<span style="letter-spacing:-.35pt"> </span>melalui<span style="letter-spacing:-.8pt"> </span>Acquirer selambat-lambatnya 14 (empat
belas) hari sejak terjadinya transaksi dan Merchant tidak akan dikenakan biaya<span style="letter-spacing:-1.9pt"> </span>pengembalian.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9"><!--[if !supportLists]--><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:Calibri">8.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Berdasarkan<span style="letter-spacing:-.25pt"> </span>laporan<span style="letter-spacing:-.4pt">
</span>Transaksi<span style="letter-spacing:-.2pt"> </span>yang<span style="letter-spacing:-.3pt"> </span>dikeluarkan<span style="letter-spacing:
-.25pt"> </span>oleh<span style="letter-spacing:-.75pt"> </span>Acquirer,<span style="letter-spacing:-.85pt"> </span>Acquirer<span style="letter-spacing:-.2pt">
</span>wajib<span style="letter-spacing:-.25pt"> </span>membayar<span style="letter-spacing:-.25pt"> </span>kepada<span style="letter-spacing:-.25pt">
</span>Merchant<span style="letter-spacing:-.3pt"> </span>dalam<span style="letter-spacing:-.25pt"> </span>waktu<span style="letter-spacing:-.2pt"> </span>minimal<span style="letter-spacing:-.25pt"> </span>2<span style="letter-spacing:-.3pt"> </span>(dua)<span style="letter-spacing:-.2pt"> </span>hari<span style="letter-spacing:-.25pt"> </span>kerja
sejak waktu cut-off terakhir ke rekening Merchant seperti yang tertera dalam
Perjanjian ini setelah dikurangi dengan jumlah MDR.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:0in;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9"><!--[if !supportLists]--><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:Calibri">9.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Sehubungan<span style="letter-spacing:-.2pt"> </span>dengan<span style="letter-spacing:-.2pt"> </span>ayat<span style="letter-spacing:-.2pt"> </span>8<span style="letter-spacing:-.2pt"> </span>diatas,<span style="letter-spacing:-.2pt"> </span>Union<span style="letter-spacing:-.15pt"> </span>Pay<span style="letter-spacing:-.15pt"> </span>bertanggung<span style="letter-spacing:
-.25pt"> </span>jawab<span style="letter-spacing:-.2pt"> </span>atas<span style="letter-spacing:-.2pt"> </span>pembayaran<span style="letter-spacing:
-.3pt"> </span>Transaksi<span style="letter-spacing:-.15pt"> </span>pemegang<span style="letter-spacing:-.2pt"> </span>kartu<span style="letter-spacing:-.2pt"> </span>untuk<span style="letter-spacing:-.2pt"> </span>Merchant<span style="letter-spacing:-.2pt">
</span>melalui<span style="letter-spacing:-.75pt"> </span>Acquirer.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9"><!--[if !supportLists]--><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:Calibri">10.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Sehubungan dengan ayat 6
diatas, Merchant setuju untuk memberikan kuasa tanpa syarat dan tanpa ditarik
kembali kepada Acquirer untuk memotong / menambah pembayaran atas Transaksi
kepada Merchant, dan untuk hal tersebut maka selanjutnya, Merchant dengan
pemberian kuasa ini membebaskan Acquirer dari segala tuntutan hukum yang
mungkin timbul di kemudian<span style="letter-spacing:-1.7pt"> </span>hari.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9"><!--[if !supportLists]--><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:Calibri">11.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Kuasa yang diberikan
kepada Merchant sebagaimana dimaksud dalam ayat 10 diatas tidak akan berakhir
oleh sebab apapun, termasuk karena alasan-alasan sebagaimana dimaksud dalam
Pasal 1813, 1814, 1816 Kitab Undang-Undang Hukum Perdata selama Merchant masih mempunyai
kewajiban kepada<span style="letter-spacing:-.75pt"> </span>Acquirer.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.4pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l0 level1 lfo9"><!--[if !supportLists]--><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:Calibri">12.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#020303">Acquirer<span style="letter-spacing:-.3pt"> </span>berhak<span style="letter-spacing:-.35pt">
</span>dengan<span style="letter-spacing:-.35pt"> </span>melakukan<span style="letter-spacing:-.3pt"> </span>pemberitahuan<span style="letter-spacing:
-.35pt"> </span>secara<span style="letter-spacing:-.35pt"> </span>tertulis<span style="letter-spacing:-.35pt"> </span>kepada<span style="letter-spacing:-.3pt">
</span>Merchant<span style="letter-spacing:-.35pt"> </span>untuk<span style="letter-spacing:-.35pt"> </span>memeriksa<span style="letter-spacing:
-.35pt"> </span>dan<span style="letter-spacing:-.3pt"> </span>menentukan<span style="letter-spacing:-.35pt"> </span>kebenaran<span style="letter-spacing:
-.35pt"> </span>dokumen<span style="letter-spacing:-.3pt"> </span>bukti
Transaksi yang disimpan oleh Merchant di kemudian<span style="letter-spacing:
-.4pt"> </span>hari.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoNormal" style="margin-top:0in;margin-right:11.5pt;margin-bottom:
0in;margin-left:0in;text-align:justify;line-height:normal;mso-pagination:none;
tab-stops:17.65pt;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:11.5pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:17.65pt;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:11.5pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:.25in;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">PROSES PENYELESAIAN<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:.25in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Acquirer <span style="color:#020303">berhak<span style="letter-spacing:-.25pt"> </span>dan<span style="letter-spacing:-.25pt"> </span>Merchant<span style="letter-spacing:-.25pt"> </span>dengan<span style="letter-spacing:-.25pt">
</span>ini<span style="letter-spacing:-.3pt"> </span>mengizinkan<span style="letter-spacing:-.75pt"> </span>Acquirer<span style="letter-spacing:-.2pt">
</span>untuk<span style="letter-spacing:-.25pt"> </span>memeriksa<span style="letter-spacing:-.3pt"> </span>dan<span style="letter-spacing:-.25pt"> </span>mencocokkan<span style="letter-spacing:-.25pt"> </span>Nota<span style="letter-spacing:-.2pt"> </span>Penjualan,<span style="letter-spacing:-.2pt"> </span>pembukuan<span style="letter-spacing:-.3pt">
</span>dan<span style="letter-spacing:-.25pt"> </span>catatan Merchant lainnya
yang terkait dengan Transaksi, di <span style="letter-spacing:-.25pt">Tempat </span>Usaha
Merchant jika sewaktu-waktu<span style="letter-spacing:-1.2pt"> </span>diperlukan.</span></span><b><span style="font-size:10.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant wajib menyimpan
dengan baik lembar pertama Nota Penjualan sekurang-kurangnya untuk jangka waktu
18 (delapan belas) bulan terhitung sejak tanggal waktu terjadinya transaksi (
atau jangka waktu lainnya sebagaimana ditetapkan dari waktu ke waktu oleh
Acquirer secara tertulis ) dan wajib menyerahkannya kepada Acquirer setiap saat
bilamana diminta oleh <span style="letter-spacing:-1.75pt">&nbsp;</span>Acquirer.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Bilamana berdasarkan Sales
Slip yang diberikan Merchant kepada Acquirer, ternyata dicurigai oleh Acquirer
bahwa Kartu yang digunakan dalam melakukan transaksi tersebut palsu, curian,
rampasan atau diperoleh sebagai hasil dari suatu tindak pidana atau transaksi
yang dilakukan tidak memenuhi ketentuan dalam Perjanjian ini atau melanggar
hukum atau tidak diakui atau dibatalkan oleh Pemegang Kartu, maka Acquirer
mempunyai hak sepenuhnya untuk menangguhkan pembayaran tagihan kepada Merchant
dan tidak akan dikenai<span style="letter-spacing:-1.2pt"> </span>bunga.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Mengacu<span style="letter-spacing:-.25pt"> </span>pada<span style="letter-spacing:-.2pt"> </span>ayat<span style="letter-spacing:-.25pt"> </span>3<span style="letter-spacing:-.2pt"> </span>Pasal<span style="letter-spacing:-.2pt"> </span>ini,<span style="letter-spacing:-.2pt"> </span>Dalam<span style="letter-spacing:-.2pt"> </span>hal<span style="letter-spacing:-.7pt"> </span>Acquirer<span style="letter-spacing:-.2pt"> </span>telah<span style="letter-spacing:-.2pt"> </span>memiliki<span style="letter-spacing:-.25pt"> </span>bukti<span style="letter-spacing:-.2pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>sah<span style="letter-spacing:-.2pt"> </span>dan<span style="letter-spacing:-.2pt"> </span>meyakinkan,<span style="letter-spacing:
-.25pt"> </span>maka<span style="letter-spacing:-.75pt"> </span>Acquirer<span style="letter-spacing:-.15pt"> </span>mempunyai<span style="letter-spacing:
-.25pt"> </span>hak<span style="letter-spacing:-.2pt"> </span>sepenuhnya<span style="letter-spacing:-.2pt"> </span>untuk tidak membayar tagihan dari Merchant
berdasarkan Sales Slip<span style="letter-spacing:-.45pt"> </span>tersebut.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Acquirer dapat dan diberi
hak untuk menangguhkan pembayaran atas tiap-tiap Transaksi apabila Acquirer dan
/ atau Penerbit Kartu meragukan keabsahan transaksi. Acquirer akan
memberitahukan kepada Merchant hal Penangguhan pembayaran ini secara <span style="letter-spacing:-1.85pt">&nbsp;</span>tertulis.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">6.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Para<span style="letter-spacing:-.25pt"> </span>Pihak<span style="letter-spacing:-.2pt"> </span>setuju,<span style="letter-spacing:-.3pt"> </span>bahwa<span style="letter-spacing:-.25pt"> </span>pembayaran<span style="letter-spacing:-.3pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>tertunda<span style="letter-spacing:-.25pt"> </span>karena<span style="letter-spacing:-.3pt">
</span>keadaan<span style="letter-spacing:-.25pt"> </span>force<span style="letter-spacing:-.3pt"> </span>majeure<span style="letter-spacing:-.25pt">
</span>atau<span style="letter-spacing:-.25pt"> </span>ditangguhkan<span style="letter-spacing:-.3pt"> </span>atau<span style="letter-spacing:-.25pt"> </span>keadaan<span style="letter-spacing:-.25pt"> </span>lainnya,<span style="letter-spacing:-.3pt">
</span>tidak<span style="letter-spacing:-.25pt"> </span>akan<span style="letter-spacing:-.3pt"> </span>dikenai<span style="letter-spacing:-.25pt">
</span>bunga.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:60.05pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">7.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Merchant tidak
diperkenankan melakukan penagihan langsung kepada Pemegang<span style="letter-spacing:-.6pt"> </span>Kartu.</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l12 level1 lfo10;
tab-stops:18.6pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">8.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Untuk setiap pembayaran
yang telah dilakukan Acquirer kepada Merchant, dan ternyata pembayarannya harus
dikembalikan (charges back) kepada Acquirer<span style="letter-spacing:-.3pt"> </span>karena<span style="letter-spacing:-.35pt"> </span>sesuatu<span style="letter-spacing:-.3pt">
</span>sebab,<span style="letter-spacing:-.35pt"> </span>maka<span style="letter-spacing:-.3pt"> </span>pembayaran<span style="letter-spacing:
-.35pt"> </span>kembali<span style="letter-spacing:-.3pt"> </span>tersebut<span style="letter-spacing:-.35pt"> </span>dilakukan<span style="letter-spacing:
-.3pt"> </span>secara<span style="letter-spacing:-.35pt"> </span>otomatis<span style="letter-spacing:-.3pt"> </span>dengan<span style="letter-spacing:-.35pt">
</span>jumlah<span style="letter-spacing:-.3pt"> </span>pembayaran<span style="letter-spacing:-.35pt"> </span>yang<span style="letter-spacing:-.3pt"> </span>merupakan<span style="letter-spacing:-.35pt"> </span>charges back tersebut akan dikurangi
langsung oleh Acquirer pada pembayaran settlement transaksi selanjutnya setelah
terjadinya charges back. Apabila setelah terjadinya charges back tidak terjadi
suatu transaksi apapun selama 7 (tujuh) hari <span style="letter-spacing:-.1pt">kalender,
</span>dan/ atau transaksi tidak mencapai jumlah dana charges<span style="letter-spacing:-.2pt"> </span>back,<span style="letter-spacing:-.2pt"> </span>maka<span style="letter-spacing:-.2pt"> </span>untuk<span style="letter-spacing:-.15pt"> </span>pembayaran<span style="letter-spacing:-.2pt"> </span>charges<span style="letter-spacing:-.2pt">
</span>back<span style="letter-spacing:-.2pt"> </span>akan<span style="letter-spacing:-.15pt"> </span>dilakukan<span style="letter-spacing:
-.2pt"> </span>oleh<span style="letter-spacing:-.2pt"> </span>Merchant<span style="letter-spacing:-.2pt"> </span>selambat-lambatnya<span style="letter-spacing:
-.15pt"> </span>7<span style="letter-spacing:-.2pt"> </span>(tujuh)<span style="letter-spacing:-.15pt"> </span>hari<span style="letter-spacing:-.15pt"> </span>kerja<span style="letter-spacing:-.2pt"> </span>setelah<span style="letter-spacing:-.2pt">
</span>klaim<span style="letter-spacing:-.2pt"> </span>ke<span style="letter-spacing:-.15pt"> </span>:</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:11.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:18.6pt 571.5pt;text-autospace:
none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">Nama Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
PT Bank Central Asia, Tbk.  <o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:11.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:13.5pt 18.6pt 571.5pt;
text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri;color:#020303">Cabang&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Menara Batavia<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:8.1pt;margin-right:11.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:18.6pt 571.5pt;text-autospace:
none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">No. Rekening&nbsp;&nbsp;&nbsp; :
546-0326020<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:8.1pt;margin-right:11.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:18.6pt 571.5pt;text-autospace:
none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">Atas Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
: PT Indopay Merchant Services</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;;color:#231F20">Apabila terdapat pelaksanaan pemotongan
charges back, maka Acquirer akan memberikan pemberitahuan secara tertulis
kepada Merchant atas pemotongan charge back tersebut berikut dengan alasan
pemotongan dan perhitungan pemotongannya.<o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:0in;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify;text-indent:
-.25in;mso-list:l12 level1 lfo10"><!--[if !supportLists]--><span style="font-size:
9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-fareast-font-family:Calibri">9.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-bidi-font-family:&quot;Times New Roman&quot;;color:#231F20">Pembayaran kembali kepada
Acquirer dapat terjadi<span style="letter-spacing:-.9pt"> </span>apabila:</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:.75pt;margin-right:11.7pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">a)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Barang<span style="letter-spacing:-.15pt"> </span>dikembalikan<span style="letter-spacing:
-.2pt"> </span>dan/atau<span style="letter-spacing:-.2pt"> </span>transaksi<span style="letter-spacing:-.2pt"> </span>dibatalkan<span style="letter-spacing:
-.2pt"> </span>oleh<span style="letter-spacing:-.2pt"> </span>Pemegang<span style="letter-spacing:-.15pt"> </span>Kartu<span style="letter-spacing:-.1pt"> </span>atas<span style="letter-spacing:-.2pt"> </span>sepengetahuan<span style="letter-spacing:
-.2pt"> </span>Merchant<span style="letter-spacing:-.2pt"> </span>dan<span style="letter-spacing:-.2pt"> </span>dengan<span style="letter-spacing:-.2pt"> </span>persetujuan<span style="letter-spacing:-.65pt"> </span>Acquirer.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">b)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Sales Slip telah dibuat
atau diubah secara tidak wajar tanpa persetujuan<span style="letter-spacing:
-1.2pt"> </span>Acquirer.</span><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">c)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Sales Slip tidak dapat
dibaca, tidak lengkap atau tidak ditanda-tangani oleh Pemegang Kartu yang<span style="letter-spacing:-1.0pt"> </span>berhak.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">d)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Pemegang Kartu membantah
adanya transaksi penjualan, mempermasalahkan mutu atau penyerahan dan/atau
pengiriman barang dengan disertai bukti-bukti yang sah dan<span style="letter-spacing:-.35pt"> </span>meyakinkan.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">e)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Penjualan barang/jasa yang
diberikan atau penggunaan kartu melanggar hukum atau peraturan dan
undang-undang yang<span style="letter-spacing:-2.0pt"> </span>berlaku.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">f)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20;letter-spacing:-.3pt">Tanda
</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#231F20">tangan pada Sales Slip berbeda dengan tanda tangan
dibelakang<span style="letter-spacing:-.3pt"> </span>kartu.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:41.8pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">g)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Sales Slip tidak
diserahkan kepada Acquirer dalam jangka yang<span style="letter-spacing:-1.05pt">
</span>ditentukan.</span><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:41.8pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">h)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20;letter-spacing:-.25pt">Terjadi
</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#231F20">kesalahan atau kekeliruan pembayaran oleh Acquirer
kepada<span style="letter-spacing:-.8pt"> </span>Merchant.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:0in;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">i)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Merchant memberi nama
Pemegang Kartu dan Nomor Kartu yang tidak benar kepada Acquirer ketika meminta<span style="letter-spacing:-1.75pt"> </span>otorisasi.</span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l5 level1 lfo11;
tab-stops:.75in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">j)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#231F20">Adanya pelanggaran
Merchant terhadap salah satu atau beberapa<span style="letter-spacing:-2.2pt"> </span>ketentuan<span style="letter-spacing:-.3pt"> </span>dalam prosedur Acquirer dan/atau penerbit
kartu<span style="letter-spacing:-2.25pt"> &nbsp;</span>sehubungan dengan transaksi atau Sales
Slip atau<span style="letter-spacing:-.3pt"> </span>lainnya.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:0in;margin-right:2.7pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;tab-stops:.75in;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:11.7pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:.75in;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:11.7pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:.75in 567.0pt;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">PROSES DAN PERNYATAAN</span></b><b><span style="font-size:10.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri"> <o:p></o:p></span></b></p>

<p class="MsoNormal" style="margin-top:.75pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;text-align:justify;text-indent:-.25in;line-height:normal;
mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">1.&nbsp;&nbsp; &nbsp;&nbsp;Seluruh proses, keluhan dan pertanyaan yang
timbul sehubungan dengan EDC, Kartu dan Transakasi dari Merchant akan dilayani
oleh pusat pelayanan konsumen Acquirer. Pusat pelayanan konsumen akan dibuka
setiap 7 (tujuh) hari seminggu antara jam 08.00 – 22.00 WIB.<o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;text-align:center;text-indent:-.25in;
line-height:normal;mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;
text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;text-align:center;text-indent:-.25in;
line-height:normal;mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;
text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:0in;margin-right:2.9pt;
margin-bottom:0in;margin-left:.25in;text-align:center;text-indent:-.25in;
line-height:normal;mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;
text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">PENGALIHAN</span></b><b><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l4 level1 lfo19;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Merchant <span style="color:#020303">dilarang<span style="letter-spacing:-.35pt"> </span>mengalihkan<span style="letter-spacing:
-.35pt"> </span>dan/atau<span style="letter-spacing:-.35pt"> </span>memindahkan<span style="letter-spacing:-.35pt"> </span>seluruh<span style="letter-spacing:-.35pt">
</span>atau<span style="letter-spacing:-.4pt"> </span>sebagian<span style="letter-spacing:-.35pt"> </span>hak<span style="letter-spacing:-.35pt"> </span>dan<span style="letter-spacing:-.35pt"> </span>kewajibannya<span style="letter-spacing:
-.35pt"> </span>berdasarkan<span style="letter-spacing:-.35pt"> </span>Perjanjian<span style="letter-spacing:-.35pt"> </span>tanpa<span style="letter-spacing:-.35pt">
</span>persetujuan tertulis terlebih dahulu dari<span style="letter-spacing:
-.85pt"> </span>Acquirer.</span></span><b><span style="font-size:10.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l14 level1 lfo16;
text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303;letter-spacing:-.3pt">Tanpa
</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">memerlukan<span style="letter-spacing:-.3pt"> </span>persetujuan<span style="letter-spacing:-.35pt"> </span>dari<span style="letter-spacing:-.3pt"> </span>Merchant,<span style="letter-spacing:-.85pt"> </span>Acquirer<span style="letter-spacing:-.25pt">
</span>berhak<span style="letter-spacing:-.35pt"> </span>mengalihkan<span style="letter-spacing:-.3pt"> </span>dan/atau<span style="letter-spacing:-.35pt">
</span>memindahkan<span style="letter-spacing:-.3pt"> </span>seluruh<span style="letter-spacing:-.3pt"> </span>atau<span style="letter-spacing:-.35pt"> </span>sebagian<span style="letter-spacing:-.3pt"> </span>hak<span style="letter-spacing:-.35pt"> </span>dan<span style="letter-spacing:-.3pt"> </span>kewajiban berdasarkan Perjanjian dengan
cara sesuai dengan ketentuan hukum yang berlaku kepada anak perusahaan atau
perusahaan afiliasi Acquirer cukup dengan pemberitahuan tertulis mengenai
pengalihan tersebut kepada<span style="letter-spacing:-.7pt"> </span>Merchant.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l14 level1 lfo16;
text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Persyaratan<span style="letter-spacing:-.3pt"> </span>dengan<span style="letter-spacing:-.3pt"> </span>ketentuan<span style="letter-spacing:-.3pt"> </span>dalam<span style="letter-spacing:-.3pt"> </span>Perjanjian<span style="letter-spacing:-.25pt"> </span>dapat<span style="letter-spacing:-.3pt"> </span>diubah<span style="letter-spacing:-.3pt"> </span>sewaktu-waktu<span style="letter-spacing:
-.3pt"> </span>oleh<span style="letter-spacing:-.8pt"> </span>Acquirer<span style="letter-spacing:-.25pt"> </span>dengan<span style="letter-spacing:-.3pt">
</span>pemberitahuan<span style="letter-spacing:-.3pt"> </span>tertulis<span style="letter-spacing:-.3pt"> </span>terlebih<span style="letter-spacing:-.35pt">
</span>dahulu<span style="letter-spacing:-.3pt"> </span>kepada Merchant
sekurang-kurangnya 10 (sepuluh) hari kalender sebelum berlakunya perubahan
tersebut. Apabila perubahan tersebut tidak dapat disetujui Merchant, Merchant
dengan memberitahukan pemberitahuan kepada Acquirer sebelum masa berlakunya
perubahan tersebut <span style="letter-spacing:-.15pt">berakhir, </span>boleh
mengakhiri Perjanjian ini sebagaimana diatur dalam Perjanjian<span style="letter-spacing:-.45pt"> </span>ini.</span><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l14 level1 lfo16;
text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;
mso-ascii-font-family:Calibri;mso-fareast-font-family:Calibri;mso-hansi-font-family:
Calibri;mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Acquirer<span style="letter-spacing:-.25pt"> </span>dapat<span style="letter-spacing:-.25pt">
</span>menerbitkan<span style="letter-spacing:-.3pt"> </span>atau<span style="letter-spacing:-.25pt"> </span>merubah<span style="letter-spacing:-.25pt">
</span>dari<span style="letter-spacing:-.3pt"> </span>waktu<span style="letter-spacing:-.2pt"> </span>ke<span style="letter-spacing:-.25pt"> </span>waktu<span style="letter-spacing:-.25pt"> </span>standar<span style="letter-spacing:-.25pt">
</span>Prosedur<span style="letter-spacing:-.25pt"> </span>Operasional<span style="letter-spacing:-.25pt"> </span>dan/atau<span style="letter-spacing:-.25pt">
</span>kebijakan<span style="letter-spacing:-.3pt"> </span>baru<span style="letter-spacing:-.25pt"> </span>sehubungan<span style="letter-spacing:
-.25pt"> </span>dengan jaringan EDC yang merupakan bagian yang tak terpisahkan
dari<span style="letter-spacing:-.6pt"> </span>Perjanjian.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:0in;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
line-height:normal;mso-pagination:none;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;text-align:center;text-indent:-.25in;
line-height:normal;mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;
text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;text-align:center;text-indent:-.25in;
line-height:normal;mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;
text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">PENGAKHIRAN PERJANJIAN<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l1 level1 lfo20;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Perjanjian ini dapat berakhir dan/atau
dinyatakan oleh salah satu Pihak dengan memberitahukan pemberitahuan tertulis
30 (tiga puluh) hari kalender sebelum tanggal efektif pengakhiran, berdasarkan
hal – hal sebagai berikut :<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l20 level1 lfo21;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">a)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Salah satu Pihak tidak memenuhi salah
satu atau lebih ketentuan yang diatur dalam perjanjian beserta ketentuan
lainnya yang merupakan satu kesatuan dengan Perjanjian;<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l20 level1 lfo21;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">b)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Salah satu Pihak dinyatakan bangkrut
atau pailit oleh pihak yang berwenang; dan<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:58.5pt;mso-add-space:auto;text-align:justify;
text-indent:-22.5pt;line-height:normal;mso-pagination:none;mso-list:l20 level1 lfo21;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">c)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Salah satu Pihak mengadakan/ berada
dalam keadaan likuidasi.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l26 level1 lfo22;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><v:shape id="_x0000_s1032" style="position:absolute;
 left:0;text-align:left;margin-left:.15pt;margin-top:.05pt;width:612.45pt;
 height:1008.25pt;z-index:-251627520;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri">Pengakhiran <span style="color:#020303">Perjanjian<span style="letter-spacing:-.15pt"> </span>dapat<span style="letter-spacing:-.25pt">
</span>juga<span style="letter-spacing:-.2pt"> </span>dilakukan<span style="letter-spacing:-.25pt"> </span>dengan<span style="letter-spacing:-.2pt">
</span>kesepakatan<span style="letter-spacing:-.25pt"> </span>Para<span style="letter-spacing:-.15pt"> </span>Pihak<span style="letter-spacing:-.2pt"> </span>yang<span style="letter-spacing:-.2pt"> </span>dituangkan<span style="letter-spacing:
-.2pt"> </span>secara<span style="letter-spacing:-.25pt"> </span>tertulis<span style="letter-spacing:-.2pt"> </span>dan<span style="letter-spacing:-.25pt"> </span>ditandatangani<span style="letter-spacing:-.2pt"> </span>oleh<span style="letter-spacing:-.25pt"> </span>Para<span style="letter-spacing:-.15pt"> </span>Pihak.</span><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l26 level1 lfo22;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Acquirer berhak untuk
mengakhiri Perjanjian dengan pemberitahuan secara tertulis 7 (tujuh) hari sebelumnya
jika ternyata dari hasil evaluasi yang dilakukan oleh Acquirer kepada Merchant
tidak<span style="letter-spacing:-.95pt"> </span>memuaskan.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l26 level1 lfo22;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><v:shape id="_x0000_s1033" style="position:absolute;
 left:0;text-align:left;margin-left:.15pt;margin-top:.05pt;width:612.45pt;
 height:1008.25pt;z-index:-251626496;mso-position-horizontal-relative:page;
 mso-position-vertical-relative:page" coordorigin="2" coordsize="12236,20160" o:spt="100" adj="0,,0" path="m12238,198r-197,l12041,19962r197,l12238,198t,-198l2,r,198l2,19962r,198l12238,20160r,-198l199,19962,199,198r12039,l12238,e" fillcolor="#1e447d" stroked="f">
 <v:stroke joinstyle="round">
 <v:formulas>
 <v:path arrowok="t" o:connecttype="segments">
 <w:wrap anchorx="page" anchory="page">
</w:wrap></v:path></v:formulas></v:stroke></v:shape><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri;color:#020303">Sehubungan dengan pengakhiran
Perjanjian, Para Pihak sepakat untuk mengesampingkan ketentuan dalam Pasal 1266
Kitab Undang-Undang Hukum Perdata, sejauh yang mensyaratkan adanya suatu
putusan atau penetapan pengadilan untuk menghentikan atau mengakhiri suatu
Perjanjian.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l26 level1 lfo22;
tab-stops:.25in .75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Dalam<span style="letter-spacing:-.25pt"> </span>hal<span style="letter-spacing:-.25pt"> </span>masih<span style="letter-spacing:-.2pt"> </span>terdapat<span style="letter-spacing:-.25pt">
</span>kewajiban<span style="letter-spacing:-.25pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>belum<span style="letter-spacing:-.25pt">
</span>diselesaikan<span style="letter-spacing:-.25pt"> </span>oleh<span style="letter-spacing:-.25pt"> </span>salah<span style="letter-spacing:-.25pt">
</span>satu<span style="letter-spacing:-.25pt"> </span>Pihak<span style="letter-spacing:-.2pt"> </span>pada<span style="letter-spacing:-.25pt"> </span>saat<span style="letter-spacing:-.25pt"> </span>pengakhiran<span style="letter-spacing:
-.25pt"> </span>maka<span style="letter-spacing:-.25pt"> </span>Pihak<span style="letter-spacing:-.2pt"> </span>yang<span style="letter-spacing:-.25pt"> </span>bersangkutan<span style="letter-spacing:-.25pt"> </span>tetap terikat untuk menyelesaikan seluruh
kewajibannya sebagaimana ditentukan dalam Perjanjian beserta ketentuan lainnya
yang merupakan satu kesatuan dengan Perjanjian, sampai dengan dipenuhinya
dan/atau diselesaikannya kewajiban<span style="letter-spacing:-.8pt"> </span>tersebut.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoNormal" style="margin-top:.75pt;margin-right:2.7pt;margin-bottom:
0in;margin-left:0in;line-height:normal;mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;
text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">INFORMASI RAHASIA<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l16 level1 lfo23;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Salah satu <span style="color:#020303">Pihak
(sebagai ”Pihak Pemberi”) dapat memberikan informasi rahasia kepada Pihak
lainnya (sebagai ”Pihak Penerima”) dalam pelak - sanaan dari Perjanjian ini.
Para Pihak sepakat bahwa pemberian, penerimaan dan penggunaan Informasi Rahasia
tersebut dilakukan sesuai dengan ketentuan yang diatur dalam Pasal<span style="letter-spacing:-.35pt"> </span>ini.</span><b><o:p></o:p></b></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l16 level1 lfo23;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Informasi Rahasia yang
dimaksud dalam Pasal ini berarti informasi yang bersifat non-publik, yang
termasuk, tetapi tidak terbatas pada, skema atau gambar produk, penjelasan
material, spesifikasi, source code atau object code, penjualan dan informasi
mengenai Klien/ pelanggan, kebijaksa - naan dan praktek bisnis Pihak Pemberi,
dan informasi mana dapat dimuat dalam media tercetak, tertulis, disk, tape,
compact disk komputer atau media lainnya yang<span style="letter-spacing:-.2pt">
</span>sesuai.</span><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:0in;mso-add-space:auto;text-align:justify;
text-indent:0in;line-height:normal;mso-pagination:none;mso-list:l16 level1 lfo23;
tab-stops:.25in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Tidak termasuk sebagai
informasi Rahasia adalah materi atau informasi yang mana dapat dibuktikan oleh
Pihak Penerima Bahwa:</span><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l25 level1 lfo24;
tab-stops:.75in 8.0in 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">a)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Pada saat penerimaannya
sebagai milik milik publik (publik domain) atau menjadi milik publik (public
domain) tanpa adanya pelanggaran di Pihak Penerima.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l25 level1 lfo24;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">b)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303;letter-spacing:-.3pt">Telah
</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">diketahui oleh Pihak Penerima pada saat diberikan oleh
oleh Pihak<span style="letter-spacing:-.3pt"> </span>Pemberi;</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:.75in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l25 level1 lfo24;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">c)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303;letter-spacing:-.3pt">Telah
</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri;color:#020303">didapatkan dari pihak ketiga tanpa adanya pembatasan
dalam<span style="letter-spacing:-.4pt"> </span>pengungkapan;</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:2.7pt;
margin-bottom:0in;margin-left:99.0pt;mso-add-space:auto;text-align:justify;
text-indent:-63.0pt;line-height:normal;mso-pagination:none;mso-list:l25 level1 lfo24;
tab-stops:.75in 567.0pt 580.5pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">d)<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Dikembangkan sendiri oleh
Pihak<span style="letter-spacing:-.15pt"> </span>Penerima.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpMiddle" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l10 level1 lfo25;
tab-stops:45.35pt 45.4pt 8.0in;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">4.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Pihak Penerima dengan ini
menyatakan bahwa Pihak Penerima tidak akan mengungkapkan Informasi Rahasia
apapun yang diberikan Pihak Pemberi, ke orang atau badan manapun selain
daripada yang diperlukan dalam melaksanakan tugas, peran, dan kewajibannya
dalam Perjanjian ini, kecuali : (a) terlebih dahulu memperoleh persetujuan dari
Pihak Pemberi; (b) kepada instansi Pemerintah Republik Indonesia terkait yang
berwenang mengatur atau mengeluarkan ijin tentang hal-hal yang diperjanjikan
dalam Perjanjian; (c) Diperintahkan oleh badan Peradilan atau instansi
Pemerintah Republik Indonesia lainnya secara tertulis dan resmi dalam rangka
penegakan hukum; (d) Menurut peraturan perundang-undangan yang berlaku di
indonesia, informasi tersebut harus diberikan kepada pihak lain yang disebut
secara jelas dalam peraturan perundang-undangan tersebut; dan Pihak Penerima
akan melakukan semua tindakan pencegahan yang wajar untuk mencegah terjadinya
pelanggaran atau kelalaian dalam pengungkapan, penggunaan atau pembuatan
salinan informasi Rahasia<span style="letter-spacing:-.55pt"> </span>tersebut.</span><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri"><o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:.75pt;margin-right:7.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l10 level1 lfo25;
tab-stops:45.35pt 45.4pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">5.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri;color:#020303">Ketentuan sebagaimana
dimaksud dalam ayat 4 Pasal ini tetap berlaku selama 2 (dua) tahun meskipun
Perjanjian ini telah<span style="letter-spacing:-1.85pt"> &nbsp;&nbsp;</span><span style="letter-spacing:-.1pt">berakhir. </span></span><span style="font-size:
9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri"><o:p></o:p></span></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:7.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:45.35pt 45.4pt;text-autospace:none"><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">&nbsp;</span></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:7.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:45.35pt 45.4pt;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:7.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:normal;
mso-pagination:none;tab-stops:45.35pt 45.4pt;text-autospace:none"><b><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">PENYELESAIAN PERSELISIHAN<o:p></o:p></span></b></p>

<p class="MsoListParagraphCxSpFirst" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l3 level1 lfo26;
tab-stops:45.35pt 45.4pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Dalam hal terjadi perselisihan di antara
Para Pihak mengenai pelaksanaan Perjanjian, maka Para Pihak sepakat untuk
menyelesaikannya terlebih dahulu secara musyawarah untuk mufakat.<o:p></o:p></span></p>

<p class="MsoListParagraphCxSpLast" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-align:justify;
text-indent:-.25in;line-height:normal;mso-pagination:none;mso-list:l3 level1 lfo26;
tab-stops:45.35pt 45.4pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><span style="font-size:9.0pt;mso-ascii-font-family:
Calibri;mso-hansi-font-family:Calibri">Jika dalam waktu 30 (tiga puluh) hari
kalender Para Pihak tidak dapat menyelesaikan secara musyawarah perselisihan
tersebut, maka Para Pihak sepakat untuk menyelesaikannya melalui Pengadilan
Negeri Jakarta Pusat (untuk selanjutnya disebut “Pengadilan”), berdasarkan
ketentuan dan peraturan hukum Indonesia yang berlaku di Pengadilan, dan
keputusannya adalah final dan mengikat bagi Para Pihak.<o:p></o:p></span></p>

<p class="MsoNormal" style="margin-top:.75pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:0in;line-height:105%;mso-pagination:none;tab-stops:45.35pt 45.4pt;
text-autospace:none"><b><span style="font-size:9.0pt;line-height:105%;mso-ascii-font-family:Calibri;
mso-hansi-font-family:Calibri">&nbsp;</span></b></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:105%;
mso-pagination:none;tab-stops:45.35pt 45.4pt;text-autospace:none"><br></p>

<p class="MsoNormal" align="center" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:0in;text-align:center;line-height:105%;
mso-pagination:none;tab-stops:45.35pt 45.4pt;text-autospace:none"><b><span style="font-size:9.0pt;line-height:
105%;mso-ascii-font-family:Calibri;mso-hansi-font-family:Calibri">LAIN – LAIN <o:p></o:p></span></b></p>

<p class="MsoListParagraph" style="margin-top:.75pt;margin-right:-.9pt;
margin-bottom:0in;margin-left:.25in;mso-add-space:auto;text-indent:-.25in;
line-height:normal;mso-pagination:none;mso-list:l21 level1 lfo29;tab-stops:
45.35pt 45.4pt;text-autospace:none"><!--[if !supportLists]--><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-fareast-font-family:
Calibri;mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri">1.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><b><span style="font-size:9.0pt;mso-ascii-font-family:Calibri;mso-hansi-font-family:
Calibri">Keterpisahan<o:p></o:p></span></b></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:#020303">Jika ada salah satu atau lebih ketentuan dalam Perjanjian ini
ternyata tidak sah, atau tidak dapat dilaksanakan berdasarkan hukum yang
berlaku, maka Para Pihak dengan ini setuju dan menyatakan bahwa keabsahan dan
daya berlaku ketentuan lainnya dalam Perjanjian ini tidak akan terpengaruh
olehnya.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;
mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:
&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:20.5pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-indent:-.25in;mso-list:l21 level1 lfo29"><!--[if !supportLists]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;
mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin">2.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><b><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:#020303">Kesatuan Perjanjian</span></b><span style="font-size:9.0pt;
font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:#020303">Perjanjian ini beserta lampiran-lampirannya,
perubahan-perubahannya, penggantian-penggantiannya dan / atau pembaharuan - pembaharuannya
merupakan satu kesatuan yang tidak terpisahkan dengan Perjanjian ini.</span><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:20.5pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-indent:-.25in;mso-list:l21 level1 lfo29"><!--[if !supportLists]--><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;
mso-hansi-theme-font:minor-latin;mso-bidi-theme-font:minor-latin">3.<span style="font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</span></span><!--[endif]--><b><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:#020303">Force Majeure</span></b><span style="font-size:9.0pt;font-family:
&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;mso-hansi-theme-font:
minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;"><o:p></o:p></span></p>

<p class="MsoBodyText" style="margin-top:.7pt;margin-right:-.9pt;margin-bottom:
0in;margin-left:.25in;margin-bottom:.0001pt;text-align:justify"><span style="font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:
minor-latin;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;
color:#020303">Masing-masing Pihak tidak dapat diminta pertanggung jawabannya
untuk keterlambatan atau kegagalan dalam memenuhi kewajibannya berdasarkan
Perjanjian ini, jika keterlambatan atau kegagalan tersebut disebabkan oleh
Force Majeure. Pihak yang mengalami Force Majeure wajib memberitahukan kepada
pihak lainnya secara tertulis peristiwa yang dialaminya disertai rekomendasi
dari aparat setempat yang berwenang, selambat-lambatnya dalam waktu 5 (lima)
Hari Kerja sejak terjadinya Force Majeure dan wajib melakukan segala sesuatu
yang dianggap penting sebagai upaya untuk tetap memenuhi kewajibannya
berdasarkan Perjanjian ini. Apabila keterlambatan atau kegagalan untuk
kewajiban akibat dari Force Majeure berlangsung lebih dari 30 ( tiga puluh )
hari kalender maka masing-masing Pihak dapat segera mengakhiri Perjanjian ini
dengan pemberitahuan tertulis kepada Pihak lainnya tanpa wajib bertanggung jawab
kepada Pihak lainnya atas kerugian yang terjadi.<o:p></o:p></span></p>'
        ]);
    }
}
