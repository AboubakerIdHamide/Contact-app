<div class="container-fluid w-100 d-flex flex-row-reverse">
    <form class="d-flex input-group w-50">
        {{-- Filter Search --}}
        <div class="input-group">
            <div class="form-outline">
              <input id="search-input" type="search" id="form1" class="form-control" name="search" value="{{request()->search}}"/>
              <label class="form-label" for="form1">Search</label>
            </div>
            <button id="search-button" type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-refresh"></i>
            </button>
            <button id="search-button" type="submit" class="btn btn-outline-secondary">
              <i class="fas fa-search"></i>
            </button>
        </div>
    </form>
</div>