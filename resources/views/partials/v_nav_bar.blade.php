 <div class="filter-price-wrapper">
 <form action="/store/search" method="get">
 <fieldset class="filter-price">
   
    <div class="price-field">
      <input type="range" name="lower_price" min="0" max="50" value="{{ isset($lowerPrice) ? $lowerPrice : 0 }}" id="lower">
      <input type="range" name="upper_price" min="0" max="50" value="{{ isset($upperPrice) ? $upperPrice : 50 }}" id="upper">
    </div>
    
    <div class="price-wrap">
      <span class="price-title"></span>
      
      <div class="price-wrap-1">
        <input id="one">
        <label for="one"><sub>$</sub></label>
      </div>
      
      <div class="price-wrap_line"></div>
      
      <div class="price-wrap-2">
        <input id="two">
        <label for="two"><sub>$</sub></label>
      </div>
    </div>
    
  </fieldset>
   <button class="btn btn-success btn-xs" style="border-color: #14d184;">Filter</button>
   </form>
</div>

<br>

<script>
    var lowerSlider = document.querySelector('#lower');
    var  upperSlider = document.querySelector('#upper');

    document.querySelector('#two').value=upperSlider.value;
    document.querySelector('#one').value=lowerSlider.value;

    var  lowerVal = parseInt(lowerSlider.value);
    var upperVal = parseInt(upperSlider.value);

    upperSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);

        if (upperVal < lowerVal + 4) {
            lowerSlider.value = upperVal - 4;
            if (lowerVal == lowerSlider.min) {
            upperSlider.value = 4;
            }
        }
        document.querySelector('#two').value=this.value
    };

    lowerSlider.oninput = function () {
        lowerVal = parseInt(lowerSlider.value);
        upperVal = parseInt(upperSlider.value);
        if (lowerVal > upperVal - 4) {
            upperSlider.value = lowerVal + 4;
            if (upperVal == upperSlider.max) {
                lowerSlider.value = parseInt(upperSlider.max) - 4;
            }
        }
        document.querySelector('#one').value=this.value
    };
</script>

 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php $paramOfUrl = explode('=', Request::fullUrl()) ?>
    @foreach($categoriesButtonsName as $key => $categoryButtonsName)
        <details open class="v-nav-dets">
            <summary class="v-nav-sum"><a class="v-nav-a" href="/store/search?category={{ $categoryButtonsName->id }}" title="Вижте продуктите в категорията"> {{ $categoryButtonsName->name }}</a></summary>
            <ul class="v-nav-ul">
                
                @foreach($subCategoriesButtonsName as $subCategoryButtonsName)
                    @if ($subCategoryButtonsName->category_id == $categoryButtonsName->id)
                        
                        @if(isset($paramOfUrl[1]) && urldecode($paramOfUrl[1]) == $subCategoryButtonsName->identifier)
                            <li class="v-nav-li active"><input type="checkbox"/><a class="v-nav-a" href="/store/search?sub_category={{ $subCategoryButtonsName->identifier }}"> {{ $subCategoryButtonsName->name }}</a></li>
                        @else
                            <li class="v-nav-li"><input type="checkbox"/><a class="v-nav-a" href="/store/search?sub_category={{ $subCategoryButtonsName->identifier }}"> {{ $subCategoryButtonsName->name }}</a></li>
                        @endif
                        
                    @endif
                @endforeach
            </ul>
        </details>
    @endforeach
</div>
        