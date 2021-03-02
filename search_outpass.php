<div class="col-md-6 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Search OutPass</h4>
            <form class="forms-sample">
                <div class="form-group">
                    <label for="out_passid">OutPass Id</label>
                    <input type="text" name="out_passid" class="form-control" id="out_passid" placeholder="EX: 123">
                </div>
                <div class="card-description text-primary search-outpass-alerts"></div>
                <button type="button" class="btn btn-primary mr-2" onclick="Search_OutPass()">Search</button>
            </form>
        </div>
    </div>             
</div>
<script>
function Search_OutPass() {
      $(".search-outpass-alerts").html("<img src='assets/images/loader.gif' height='80'>");
      var formdata = {
        out_passid:$("#out_passid").val(),
        search_OutPass:"search_OutPass"
      }
      $.ajax({
          type:"POST",
          url:"back_end.php",
          data:formdata,
          success:function (responce) {
            $(".AjaxContentDisplay").html(responce);
          }
      });
    }
    </script>