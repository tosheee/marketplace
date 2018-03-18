<!--=========MIDDEL-TOP_BAR============-->
<div class="middleBar">
    <div class="container">
        <div class="row display-table">
            <div class="col-sm-3 vertical-align text-left hidden-xs">
                <a href="/"><img  style="margin: 0px 50px 0px 0" width="220" src="/marketplace_logo.png" alt=""></a>
            </div>
            <!-- end col -->

            <div class="col-sm-7 vertical-align text-center">
                <form action="/store/search" method="get">
                    <div class="row grid-space-1">
                        <div class="col-sm-6">
                            <input type="text" name="keyword" class="form-control input-lg" placeholder="Search" value="">
                        </div>
                        <!-- end col -->
                        <div class="col-sm-3">
                            <select class="form-control input-lg" name="sub_category" id="search-select-category">
                                <option style="padding-top: 2cm;" value="all"><b>Departments</b></option>

                                @foreach($categoriesButtonsName as $categoryButton)
                                    <!-- category-name -->
                                    <optgroup label="{{ $categoryButton->name }}">
                                        <!-- sub category-name -->
                                        @foreach($subCategoriesButtonsName as $subCategoryButton)
                                            @if ($subCategoryButton->category_id == $categoryButton->id)
                                                <option value="{{ $subCategoryButton->identifier }}">{{ $subCategoryButton->name }}</option>
                                            @endif
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-default btn-block btn-lg" ><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
            </div>


            <!-- end col -->
            <div class="col-sm-2 vertical-align header-items hidden-xs">
                <div class="header-item mr-5">
                    <?php $allLikes = count(App\Like::all()); ?>
                </div>

                <div class="">
                    <a id="view-contact-form"> Do you need from help?</a></span>
                    {{ isset($siteViewInformation->phone_com) ? '' : '' }}
                    {{ isset($siteViewInformation->phone_com) ? '' : '' }}
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end  row -->
    </div>
</div>

<script>
    var modalContactForm = document.getElementById('modal-contact-form-wrapper');
    var btnViewContact = document.getElementById("view-contact-form");
    var spanContactForm = document.getElementsByClassName("close")[0];

    btnViewContact.onclick = function() {
        modalContactForm.style.display = "block";
    }

    spanContactForm.onclick = function() {
        modalContactForm.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modalContactForm) {
            modalContactForm.style.display = "none";
        }
    }
</script>