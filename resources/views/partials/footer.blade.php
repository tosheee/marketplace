
<link href="https://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
<!--footer start from here-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-col">
                <div class="logofooter"> {{ isset($siteViewInformation->address_com) ? $siteViewInformation->name_company : 'Logo' }}</div>
                @if(isset($siteViewInformation->description_com))
                <p>{!!  substr($siteViewInformation->description_com, 0, 300) !!}.....</p>
                @else
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley.</p>
                @endif

                <p><i class="fa fa-map-pin"></i>Адрес: {{ isset($siteViewInformation->address_com) ? $siteViewInformation->address_com : 'City, Country' }}</p>
                <p><i class="fa fa-phone"></i>Тел.:  {{ isset($siteViewInformation->phone_com) ? $siteViewInformation->phone_com : '0888 888 888'}} </p>
                <p><i class="fa fa-envelope"></i> E-mail : {{ isset($siteViewInformation->phone_com) ? $siteViewInformation->email_com : 'example@com.com' }}</p
                <p>
                    <img src="https://s.tyxo.com/placeholder.png" width="128" height="50" alt="placeholder" class="tyxo-button" data-id="516545932646" data-token="M7H4rCWu" data-btn="22" data-font-size="12" data-bgcolor="DB2828" data-txtcolor="FFF" data-padding="4"></i>
                </p>

            </div>
    
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7">Продукти</h6>
                <ul class="footer-ul">
                    @if (isset($subCategoriesButtonsName))
                        @foreach($subCategoriesButtonsName as $key=> $subCategoryButtonsName)
                            @if($key <= 7)
                                <li><a href="/store/search?sub_category={{ $subCategoryButtonsName->identifier }}">{{ $subCategoryButtonsName->name }}</a></li>
                            @endif
                        @endforeach
                    @else
                        <li><a href="#"> Career</a></li>
                        <li><a href="#"> Privacy Policy</a></li>
                        <li><a href="#"> Terms & Conditions</a></li>
                        <li><a href="#"> Client Gateway</a></li>
                        <li><a href="#"> Ranking</a></li>
                        <li><a href="#"> Case Studies</a></li>
                        <li><a href="#"> Frequently Ask Questions</a></li>
                    @endif
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7"></h6>
                <ul class="footer-ul">
                    @if (isset($subCategoriesButtonsName))
                        @foreach($subCategoriesButtonsName as $key=> $subCategoryButtonsName)
                            @if($key >= 7)
                                <li><a href="/store/search?sub_category={{ $subCategoryButtonsName->identifier }}">{{ $subCategoryButtonsName->name }}</a></li>
                            @endif
                        @endforeach
                    @else
                        <li><a href="#"> Career</a></li>
                        <li><a href="#"> Privacy Policy</a></li>
                        <li><a href="#"> Terms & Conditions</a></li>
                        <li><a href="#"> Client Gateway</a></li>
                        <li><a href="#"> Ranking</a></li>
                        <li><a href="#"> Case Studies</a></li>
                        <li><a href="#"> Frequently Ask Questions</a></li>
                    @endif
            </div>
            <div class="col-md-3 col-sm-6 footer-col">
                <h6 class="heading7">Социални мрежи</h6>
                <ul class="footer-social">
                    <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i></li>
                    <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i></li>
                    <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i></li>
                    <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i></li>
                </ul>
                

                
                
            </div>
        </div>
    </div>
</footer>
<!--footer start from here-->

<div class="copyright">
    <div class="container">
        <div class="col-md-12">
            <p style="text-align: center;"><a href="http://floromaniq.com/"><span>FloroManiq</span>.com</a> © 2018 . All Rights Reserved.</p>
        </div>
    </div>
</div>