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
                                                    <a href="{{$prefix_admin_edit}}" style="text-decoration:none;color:#fff" target="_blank">
                                                        <img alt="Batdongsan.com.vn" src="{{env('APP_URL') . $article->gallery_image ? Helpers::file_path($article->id, $prefix_img, true).THUMBNAIL_PATH.json_decode($item->gallery_image)[0] : THUMBNAIL_DEFAULT }}" style="width:169px;vertical-align:top;height:88px;min-width:169px" class="CToWUd"> </a></td>
                                                <td style="min-width:400px;width:400px;padding-left:30px;font-size:16px;font-family:Arial;color:#055699" valign="middle">
                                                    <a href="{{$prefix_admin_edit}}" style="text-decoration:none;color:#055699" target="_blank" >{{$article->title}}</a></td>
                                            </tr>
                                            </tbody>
                                        </table>
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