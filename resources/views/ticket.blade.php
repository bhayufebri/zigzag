

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
	     height:700px;
	     border: 1px solid black;
	     padding:10px;
	     overflow:auto;
	     margin:auto;
	 }

	 .left {
	     display:block;
	     float:left;
	     width:381px;
	     height:330px;
	     padding:10px;
	     border: 1px solid  #D1D2D4;
	 }
	 
	 .left h3{
	     margin-top: -10px;
	     margin-left: 10px;
	 }
	 .left p{
	     font-weight:200;
	     margin-left: 10px;
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

<!-- <table>
<tr>
<td style="width:400px"><img src="{{ public_path('assets/images/logo-green.png') }}" >
<br/>
Event : 
<br/>
{{$user_ticket->invoice_detail->invoice->event->name}}
<br/>
Venue : 
<br/>
{{$user_ticket->invoice_detail->invoice->event->venue}}
<br/>
Date : 
<br/>
{{$user_ticket->invoice_detail->ticket->event_time->event_date_start}} - {{$user_ticket->invoice_detail->ticket->event_time->event_date_end}}

</td>
<td> -->
<!-- {{$qr}} -->
<!-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($user_ticket->ticket_number)) !!} ">
{{$user_ticket->ticket_number}}
<br/>
{{$user_ticket->buyer->name}}
<br/>
{{$user_ticket->invoice_detail->invoice->created_at}}
<br/>
{{$user_ticket->invoice_detail->ticket->detail}}
</td>
</tr>
</table> -->


<div class="main">
	    <div class="left">
            <img src="{{ public_path('assets/images/logo-green.png') }}" width="180">
            <p>Event:</p>
            <p><strong>{{$user_ticket->invoice_detail->invoice->event->name}}</strong></p>
            <p>Venue:</p>
            <p><strong>
                {{$user_ticket->invoice_detail->invoice->event->venue}}
            </strong></p>
            <p>Date and Time:</p>
            <p><strong>{{$user_ticket->invoice_detail->ticket->event_time->event_date_start}} - {{$user_ticket->invoice_detail->ticket->event_time->event_date_end}}</strong></p>
	    </div>
	    <div class="right">
            <div class="rightimg">
                
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->backgroundColor(209,210,212)->size(180)->generate($user_ticket->ticket_number)) !!} " alt="" class="qrcode">
            </div>
            <div class="right-content">
            
                <p>{{$user_ticket->ticket_number}}</p>
                <p>{{$user_ticket->buyer->name}}</p>
                <p>Ordered on {{ strftime( "%d %B %Y", strtotime($user_ticket->invoice_detail->invoice->created_at))}}</p>
		    <p>Type :  {{$user_ticket->invoice_detail->ticket->detail}}
		
		    </p>
		    <p>Ref  : Online</p>
                
            </div>
	    </div>
        <div class="term">
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
	    </div>
    </div>
</body>
</html>