    <div class="d-flex flex-row gap-1 my-2">
        <?php
            $categories = explode(",", $categoryList);
        ?>
        
        @foreach ($categories as $category)
            <span style="width:30px; height:30px;" class="ml-1 text-white fw-bold bg-secondary align-items-center d-flex justify-content-center rounded-circle">
            {{$category}}
            </span>
        @endforeach
    </div>