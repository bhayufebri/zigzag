

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>E-Ticket</title>

    <!-- <img src="{{ public_path('my/image.png') }}"> -->


    <style>
	 @import url("https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900");
	 @import url("https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900");
	 @import url("https://fonts.googleapis.com/css?family=Montserrat+Alternates:300,400,500,600,700,800");
	 @import url("https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900");
	 body {
	     font-family: "Roboto", sans-serif;
	 }
	 .main {-
	     width:600px;
	     margin: auto;
	     height:1000px;
	     border: 1px solid black;
	     padding:10px;
	     overflow:auto;
	     margin:auto;
	 }

	 .left {
	     display:block;
	     float:left;
	     width:50px;
	     /* height:330px;
	     padding:10px; */
	     /* border: 1px solid  #D1D2D4; */
	 }
	 
	 
	 .left h3{
	     margin-top: -10px;
	     margin-left: 10px;
	 }
	 .left p{
	     font-weight:200;
	     margin-left: 10px;
	 }
	.center {
			/* display:block;
			float:center; */
			text-align:center;
			line-height: 20%;
			padding-left: 100px;
			/* width:381px;
			height:330px;
			padding:10px;
			border: 1px solid  #D1D2D4; */
		}
		.center h1{
			font-size: 26px;
			line-height: 20%;

		}
		.center h2{
			font-size: 16px;
			line-height: 20%;

		}
		.center h3{
			font-size: 12px;
			line-height: 20%;

		}

		.isi{
			line-height: 30%;
			padding-top: 1px;
			
		}

		.isi h1{
			text-align:center;
			font-size:20px;
			/* line-height: 5%; */

		}
		.isi h2{
			text-align:left;
			font-size:12px;
			/* line-height: 30%; */

		}
		.isi h4{
			text-align:left;
			font-size:12px;
			padding-left:20px;
			

		}
		.isi h3{
			text-align:left;
			font-size:12px;
			/* height:100px;
			width:100px; */
			padding-left: 40px;
		}
		.isi h5{
			text-align:center;
			font-size:12px;
			padding-left:400px;
			/* margin-top:-100px; */
			width:200px;

			

		}
		.line{
			width:670px;
			height:1px;
			padding:1px;
			border: 1px solid  #0d0d0d;
		}
	 .right {
	     display:block;
	     float:right;
	     width:275px;
	     height:330px;
	     background: #D1D2D4;
	     padding:10px;
	     border: 1px solid #D1D2D4;
	 }

	 .right p{
	     line-height: 0.6;
	     margin-left: 10px;
	 }
	 .qrcode{
	     margin-left: 50px;
	 }
	 .term{
	     clear:both;
	     display:block;
	     width: 790px;
	     margin-top:370px;
	     padding: 10px;
	 }
	 .term .title{
	     margin-left: 10px;
	 }

	 .term ol{
	     margin-top: -10px;
	     margin-left: -20px;
	 }

	 .term ol li{ 
	     font-size: 12px;
	     line-height: 1.4;
	     font-style: italic;
	     font-weight: 300;
	 }
	</style>

</head>
<body>



<div class="main">
	    <div class="left">
            <img src="{{ public_path('assets/images/koperasi.png') }}" width="100">
            <!-- <p>Event:</p>
            <p><strong>{{$member->nama}}</strong></p>
            
            <p>Date and Time:</p>
            <p><strong>{{$member->nama}}</strong></p> -->
	    </div>
	    <!-- <div class="right">
            <div class="rightimg">
                
                
            </div>
            <div class="right-content">
            
                <p>{{$member->nama}}</p>
                <p>{{$member->nama}}</p>
                <p>Ordered on {{ $member->nama}}</p>
		    
		    <p>Ref  : Online</p>
                
            </div>
	    </div> -->
		<div class="center">
		<h1>KOPERASI KARYAWAN "TUNAS SURYA"</h1>
		<h2>Badan Hukum No. 6796A/BH/II/1990</h2>
		<h3>Alamat : Jl. Raya Kediri Kertosono KM 7, Desa Ngebrak</h3>
		<h3>Kec. Gampengrejo Kab. Kediri, Jawa Timur Indonesia, Tlp. (0354) 684661 Ext.4104</h3>
		</div>
	 

	 	


		<div class="line"></div>
		<div class="isi">
	 		<h1>FORMULIR KEANGGOTAAN</h1>
			 <h2>Yang bertandatangan dibawah ini :</h2>
			 <h4>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->nama}}</h4>
			 <h4>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->nik}}</h4>

			 <h4>Lembaga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->lembaga}}</h4>

			 <h4>Bank / No. Rek. : {{$member->bank}} / {{$member->rekening}}</h4>

			 <h4>Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->alamat}}</h4>
			 <h4>Tanggal Lahir &nbsp;&nbsp;&nbsp;&nbsp;: {{$member->tanggal_lahir}}</h4>


			

			 <h2>Dengan ini saya mengajukan permohonan untuk dapat diterima menjadi anggota Koperasi Karyawan "tunas Surya"
			 </h2><h2>
			 Demikian permohonan saya, atas perkenaannya disampaikan terima kasih.</h2>
	 		<br/>
	 		<br/>

			 <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kediri, __________________</h3>
			 <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
			 Disetujui&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; 
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pemohon</h3>
			 <br/>
			 <br/>
			 <br/><br/>
			 <br/>

			 <br/>
			 <br/>
			 <br/>


			 <h3>___________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			 
			 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;___________________</h3>

			 <!-- <h5>Kediri,__________________________</h5>
			 <h5>Pemohon</h5>
			 <h5>___________________</h5> -->

			 <br/>
			 <br/>
			 <br/>
			 <br/>

			 <div class="line"></div>


			 <h1>SURAT KESANGGUPAN</h1>
			 <h2>Yang bertandatangan dibawah ini :</h2>
			 <h4>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->nama}}</h4>
			 <h4>NIK &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->nik}}</h4>

			 <h4>Lembaga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$member->lembaga}}</h4>

			 			

			 <h2>1. Dengan ini saya sanggup membayar simpanan pokok sebesar Rp. 50.000,-</h2>
			 <h2>2. saya sanggup membayar simpanan wajib sebesar Rp. 50.000,- (lima puluh ribu rupiah) perbulan.</h2>
			 <h2>3. Pembayaran tersebut akan dilakukan melalui pemotongan gaji.</h2>
			 <h2>4. Saya sanggup menaati Anggaran Dasar, Anggaran Rumah Tangga dan peraturan yang berlaku di </h2>
			 <h2> &nbsp; &nbsp; &nbsp;Koperasi Karyawan "Tunas Surya"</h2>


	 		<br/>
	 		<h5>Kediri, ____________________</h5>
	 		<h5>Pemohon</h5>
	 		<br/>
	 		<br/>
	 		<br/>
	 		<br/>

	 		<h5>_______________________________</h5>


		 </div>
        <!-- <div class="term">
            <h4><strong>Term & Condition</strong></h4>
            <ol>
                <li>Proof of ID is a requirement for every ticket purchased <br/>
                Wajib menunjukkan kartu identitas untuk setiap pembelian ticket</li>

                <li>E-voucher is your ticket, and for some events apply also as a valid entry ticket<br/>
                E-voucher adalah tiket anda yang sah, dan untuk beberapa event berlaku juga sebagai tiket masuk yang sah</li>

                <li>E-voucher can be printed or simply shown when entering the venue<br/>
                E-voucher dapat dicetak/print atau cukup dengan diperlihatkan saat memasuki tempat berlangsung acara</li>

                <li>Tickets are non-refundable<br/>
                Tiket yang sudah dibeli tidak dapat dikembalikan</li>

                <li>We are NOT responsible for the lost of this e-voucher<br/>
                Kami tidak bertanggung jaawab atas kehilangan e-voucher ini</li>

                <li>NO WEAPON & NO DRUGS<br/>
                DILARANG MEMBAWA SENJATA ATAU OBAT-OBATAN TERLARANG</li>

                <li>We will have every right to refuse and/or discharge entry for ticket holders that doses not meet the Term & Condition<br/>
                Penyelenggara berhak untuk tidak memberikan izin untuk masuk ke dalam tempat acara apabila syarat-syarat <br/> dan ketentuan tidak dipenuhi</li>
            </ol>
	    </div> -->
    </div>
</body>
</html>