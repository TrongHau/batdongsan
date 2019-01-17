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
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tbody>
                                <tr>
                                    <td style="color:#39464e;font-family:Arial;font-size:14px;line-height:125%;text-align:left"
                                        valign="top">
                                        Chào bạn {{$user->name}}
                                        Cảm ơn bạn đã đăng ký làm thành viên của batdongsan.company
                                        Để kích hoạt tài khoản, bạn vui lòng kích vào đường dẫn dưới đây (hoặc sao chép và dán vào thanh địa chỉ của trình duyệt):
                                        <a href="{{env('APP_URL') .'/xac-nhan-email/'. $token->token}}" >{{env('APP_URL') .'/xac-nhan-email/'. $token->token}}</a>
                                        Thông tin tài khoản của bạn:
                                        Tên đăng nhập: {{$user->email}}
                                        Xin vui lòng liên lạc với chúng tôi nếu Quý khách cần thêm thông tin.
                                        Đây là email tự động. Việc hồi âm cho địa chỉ email này sẽ không được ghi nhận.
                                        Trân trọng,
                                        Phòng Dịch Vụ Khách Hàng
                                        batdongsan.company
                                        hotro@batdongsan.company
                                        From:Bất Động Sản - a Học
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
                                           target="_blank"
                                           data-saferedirecturl="https://www.google.com/url?q=https://mandrillapp.com/track/click/30230333/www.shedul.com?p%3DeyJzIjoiMzZUQVhmWEg0UlpqbkRTUF9sNEI4cVdYNmVzIiwidiI6MSwicCI6IntcInVcIjozMDIzMDMzMyxcInZcIjoxLFwidXJsXCI6XCJodHRwczpcXFwvXFxcL3d3dy5zaGVkdWwuY29tXCIsXCJpZFwiOlwiNzA0ODY0MDAxMzMyNGVmNjhlN2M5MTU1ODcyM2M4OTZcIixcInVybF9pZHNcIjpbXCJjYmI3NjhhOTc5OTE3ZDFkNzYyMDBmYTE5Y2JkNmI1NGY4YmMzZGNjXCJdfSJ9&amp;source=gmail&amp;ust=1537710632948000&amp;usg=AFQjCNGwQ-vorlysOzrH42UHMK8lDD_69w">Được hỗ trợ bởi {{env('APP_NAME')}}</a>
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