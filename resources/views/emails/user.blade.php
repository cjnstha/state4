<!DOCTYPE html>
<html>
<head>
    <title>User Create</title>
</head>
 
<body>
<?php $title = DB::table('general_settings')->select('title','logo')->first(); ?>
<div style="margin:0 auto; padding:50px 0; width: 100%;">
        <center>
            <table style="width:600px; margin:0px auto; background:#fff; padding:0px; border:1px solid #ececec" cellpadding="0" cellspacing="0" border="0">
                <tr class="logo">
                    <td style="padding:0 20px; border-bottom:1px dashed #500847; margin:0; text-align: center;">
                        <a href="{{ URL::to('/') }}" style="display:block;">
                            <img class="w320" height="120" src="{{ asset('images/logo/'.$title->logo) }}" alt="company logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="font-size:14px; padding:10px 20px 10px 0; margin:0; font-family:Arial;" class="mobile-spacing"> <p> Dear {{$user['name']}}, </p>
                        <p style="padding:0 0 10px 0; margin:0; color: #52595f;">The administrator of the system – <b>{{ $title->title }}</b> just assigned you a Role of "<b>@foreach( $rolesarray as $key => $ary) {{ $ary. ' '}}  @endforeach </b>" with following details:</p>
                    </td>
                </tr>
                
                <tr>
                    <td style="padding:0 20px; margin:0; font-size:14px; font-family:Arial; ">
                        <table style="padding:5px 20px; margin:0; background:#fafafa; width:100%;">
                         <tr>
                          <td style="width:20%; text-align: left;">
                           <b style="margin:0 20px 0 0; padding:0;">Email:</b>
                          </td>
                          <td align="left" style="text-align: left; width: 80%;">{{ $user['email'] }}
                          </td>
                         </tr>
                        </table>
                       
                    </td>
                </tr>
                <tr>
                    <td style="padding:0 20px; margin:0;font-size:14px; font-family:Arial;">
                    <table style="padding:5px 20px; margin:0; background:#fafafa; width: 100%;">
                     <tr>
                      <td align="left" style="width:20%;"><b style="margin:0 20px 0 0; padding:0;">Password:</b></td>
                      <td align="left" style="width: 80%; text-align: left;">
                       {{ $password }}
                      </td>
                     </tr>
                    </table>
                       
                    </td>
                </tr>
                <tr class="highlight" style="padding:0; margin:0;">
                    <td style="font-size:14px; padding:10px 20px; margin:0; font-family:Arial;" class="w320 mobile-spacing">
                        <p style="color: #52595f; padding:0; margin:0">Please visit <a href="{{ URL::to('/') }}">here</a> to login to the system. </p>
                    </td>
                </tr>
             
                    <tr class="footer" style="padding:0; margin:0;">
                        <td style="padding:0 20px 10px;font-family:Arial;">
                            <p style="font-size:14px;line-height:normal; 
                            margin:0; padding:20px 0 0 0; color:#52595f; border-top:1px dashed #ccc;">Thank You,</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;font-family:Arial; padding:0 20px 0">
                            <p style="font-size:14px;line-height:normal; margin:0; padding:20px 0 0 0;">{{ $title->title }} Management Team</p>
                        </td>
                    </tr>
                   
                        </td>
                    </tr>
            </table>
        </center>
    </div>
</body>
 
</html>
