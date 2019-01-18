<center>
    <table bgcolor="#fff" border="0" cellspacing="0" height="100%" style="background-color:white;max-width:600px"
           width="100%">
        <tbody>
        <tr>
            <td align="center" valign="top">
                <table border="0" cellpadding="0" cellspacing="0" style="border-top:10px solid #50c7a7;padding:0"
                       width="100%">
                    <tbody>
                    <tr>
                        <td align="center"
                            style="border-left:1px solid #ddd;border-right:1px solid #ddd;border-bottom:1px solid #ddd;padding:20px"
                            valign="top">
                            <table align="center" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="font-family:Arial;min-width:620px" width="620">
                                <tbody>
                                <tr>
                                    <td align="center" style="padding:20px;border-bottom:1px solid #dedede">
                                        <table cellpadding="0" cellspacing="0" style="min-width:580px;width:580px;height:88px">
                                            <tbody>
                                            <tr>
                                                <td align="center" style="min-width:169px;width:169px">
                                                    <a href="{{env('APP_URL')}}" style="text-decoration:none;color:#fff" target="_blank">
                                                        <img alt="Batdongsan.com.vn" src="https://batdongsan.company/imgs/thumbnail_default.png" style="width:169px;vertical-align:top;height:88px;min-width:169px" class="CToWUd"> </a></td>
                                                <td style="min-width:400px;width:400px;padding-left:30px;font-size:16px;font-family:Arial;color:#055699" valign="middle">
                                                    THÔNG BÁO TỪ<br>
                                                    <strong>BAN QUẢN TRỊ <a href="{{env('APP_URL')}}" style="text-decoration:none;color:#055699" target="_blank" >{{env('APP_PAGE_URL')}}</a></strong></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="10">
                                        &nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0px 65px">
                                        <div style="line-height:25px;font-family:Arial;font-size:15px;color:#555555">
                                            Chào bạn&nbsp; <strong><span style="color:#055699">{{$user->name}}</span></strong><br>
                                            <p>Cảm ơn bạn đã đăng ký làm thành viên của <a style="color:#055699;text-decoration:underline;font-weight:bold" href="{{env('APP_URL')}}" target="_blank" >{{env('APP_PAGE_URL')}}</a></p><br>
                                            <p>Để kích hoạt tài khoản, bạn vui lòng kích vào đường dẫn dưới đây (hoặc sao chép và dán vào thanh địa chỉ của trình duyệt): <a href="{{env('APP_URL') .'/xac-nhan-email/'. $token->token}}" target="_blank" >{{env('APP_URL') .'/xac-nhan-email/'. $token->token}}</a></p></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0px 65px">
                                        <div style="line-height:25px;margin-top:15px;font-family:Arial;font-size:15px;color:#555555">
                                            Thông tin tài khoản của bạn:
                                            <a href="mailto:{{$user->email}}" style="color:#055699" target="_blank">{{$user->email}}</a>
                                        </div>
                                        <div style="line-height:25px;margin-top:15px;font-family:Arial;font-size:15px;color:#555555">
                                            Xin vui lòng liên lạc với chúng tôi nếu Quý khách cần thêm thông tin.</div>
                                        <div style="line-height:25px;margin-top:15px;font-family:Arial;font-size:15px;color:#555555">
                                            Đây là email tự động. Việc hồi âm cho địa chỉ email này sẽ không được ghi nhận.</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="font-family:Arial;font-size:15px;color:#555555;padding:20px 65px 20px 65px">
                                        Trân trọng,<br>
                                        Phòng Dịch Vụ Khách Hàng<br>
                                        <a href="{{env('APP_URL')}}" target="_blank" >batdongsan.com.vn</a><br>
                                        <a href="hotro@batdongsan.company" style="color:#055699" target="_blank">{{env('HO_TRO')}}</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table bgcolor="#FFF" border="0" cellpadding="10" cellspacing="0"
                                   style="background-color:white" width="100%">
                                <tbody>
                                <tr>
                                    <td align="center">
                                        <a href="{{env('APP_URL')}}"
                                           style="color:#a8a6a6;font-family:Arial;font-size:12px;line-height:100%;text-decoration:none"
                                           target="_blank">Được hỗ trợ bởi {{env('APP_NAME')}}</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</center>