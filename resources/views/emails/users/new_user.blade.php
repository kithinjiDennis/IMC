@include('includes.email_header')
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="backgroundTable">
    <tbody>
        <tr>
          <td><table width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
              <tbody>
              <tr>
                  <td width="100%">
                  <table bgcolor="#ffffff" width="600" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth">
                      <tbody>
                      <tr>
                          <td width="100%" height="20"></td>
                        </tr>
                      <tr>
                          <td width="100%"><table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                              <tbody>
                              <tr>
                                  <td><table width="560" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                      <tbody>
                                      <tr>
                                          <td style="font-family: Open Sans,open-sans,sans-serif; font-size:14px; line-height:22px; vertical-align: top; padding:10px 0;"><strong> Dear <?php echo !empty($data['name']) ? $data['name'] : 'user'; ?>,</strong></td>
                                        </tr>
                                      <tr>
                                          <td style="font-family: Open Sans,open-sans,sans-serif; font-size:16px; line-height:22px; vertical-align: top; padding:10px 0;">Welcome to IMC. Please use below credentials to <a target="_blank" href="{{ config('variable.SERVER_URL').'/login' }}">login</a>.</td>
                                      </tr>
                                        <tr>
                                          <td style="font-family: Open Sans,open-sans,sans-serif; font-size:14px; line-height:22px; vertical-align: top;">
                                                  Email: <?php echo $data['email'];?><br/>
                                                  Password: <?php echo $data['password'];?>
                                          </td>
                                          
                                        </td>
                                      </tr>
										 <tr>
                                  <td><table width="560" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                                      <tbody>
                                      <tr>
                                          <td style="font-family: Open Sans,open-sans,sans-serif; font-size:14px; line-height:22px; vertical-align: top; padding:10px 0; "><br/><br/> Kind regards, </td>
                                        </tr>
                                      <tr>
                                          <td> {{ config('variable.SITE_NAME') }} Team </td>
                                        </tr>

                                    </tbody>
                                    </table></td>
                                </tr>
                                    </tbody>
                                    </table></td>
                                </tr>
                             

                              <tr>
                                  <td style="border-bottom:2px  #ccc; height:5px; padding:10px;"></td>
                                </tr>
                            </tbody>
                            </table></td>
                        </tr>
                    </tbody>
                    </table>

                 </td>
               </tr>
          </td>
        </tr>
    </tbody>
</table>


<table  width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
       <td>
           <tr>
            <table width="600" cellpadding="0" cellspacing="0" border="0" bgcolor="#312055" align="center">
                <tr>
                   <td height="20px"></td>
                </tr>
            </table>


           </tr>
       </td>
    </tr>
</table>

@include('includes.email_footer')
