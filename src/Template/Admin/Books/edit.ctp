<?= $this->Html->css('bootstrap-datepicker.min.css') ?>
<?= $this->Html->script('bootstrap-datepicker.min.js') ?>

<script type="text/javascript">
    $(function(){    

        $.fn.datepicker.dates['vi'] = {
          days: [ "Chủ Nhật", "Thứ Hai", "Thứ Ba", "Thứ Tư", "Thứ Năm", "Thứ Sáu", "Thứ Bảy" ],
          daysShort: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
          daysMin: [ "CN", "T2", "T3", "T4", "T5", "T6", "T7" ],
          months: [ "Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai" ],
          monthsShort: [ "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12" ],
          weekStart: 0
      };

          $('.datepicker').datepicker({
              format: 'dd/mm/yyyy',
              todayHighlight: true,
              language: 'vi',
              autoclose: true
          });
      });

    function number_format (number, decimals, dec_point, thousands_sep) {
        var n = number, prec = decimals;

        var toFixedFix = function (n,prec) {
            var k = Math.pow(10,prec);
            return (Math.round(n*k)/k).toString();
        };

        n = !isFinite(+n) ? 0 : +n;
        prec = !isFinite(+prec) ? 0 : Math.abs(prec);
        var sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep;
        var dec = (typeof dec_point === 'undefined') ? '.' : dec_point;

        var s = (prec > 0) ? toFixedFix(n, prec) : toFixedFix(Math.round(n), prec);
        //fix for IE parseFloat(0.55).toFixed(0) = 0;

        var abs = toFixedFix(Math.abs(n), prec);
        var _, i;

        if (abs >= 1000) {
            _ = abs.split(/\D/);
            i = _[0].length % 3 || 3;

            _[0] = s.slice(0,i + (n < 0)) +
                   _[0].slice(i).replace(/(\d{3})/g, sep+'$1');
            s = _.join(dec);
        } else {
            s = s.replace('.', dec);
        }

        var decPos = s.indexOf(dec);
        if (prec >= 1 && decPos !== -1 && (s.length-decPos-1) < prec) {
            s += new Array(prec-(s.length-decPos-1)).join(0)+'0';
        }
        else if (prec >= 1 && decPos === -1) {
            s += dec+new Array(prec).join(0)+'0';
        }
        return s;
    }

    function format_price(){
        var sale = document.getElementById('sale').value.replace(/,/g,"");
        document.getElementById('sale').value = number_format(sale*1)

        var price = document.getElementById('price').value.replace(/,/g,"");
        document.getElementById('price').value = number_format(price*1)
    }
</script>

<h3><i class="fa fa-server"></i>&nbsp;&nbsp;Chỉnh sửa sách</h3>
<hr>
<div class="col-md-offset-3 col-md-6">
    <?= $this->Form->create($book, ['novalidator'=>true, 'type'=>'file']) ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Sách bán chạy:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('hot', ['multiple' => 'checkbox', 'label'=>false, 'style'=>'margin-left:-20px; margin-top:-5px;']); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Danh mục sách:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('category_id', array( 'class' => 'form-control',
            'options' => $categories, 'label' => false, 'div' => false, "placeholder" => "Danh mục sách"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Tên Sách:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('title', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Tên sách"));?>
        </div>
    </div>
    <!-- <div class="form-group">
        <label class="col-sm-3 control-label">Slug:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('slug', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Slug", 'required'=>false));?>
        </div>
    </div> -->
    <div class="form-group">
        <label class="col-sm-3 control-label">Hình ảnh:</label>
        <div class="col-sm-9">
            <?php echo $this->Html->image($book['image'],['class'=>'img img-responsive', 'style'=>'width:100px;', 'value'=> $book['image']]); ?>
            <input type="file" name="data[image]" accept="image/*" id="SalonImage" value="<?php echo $book['image'];?>">
        </div>
    </div>    
    <div class="form-group">
        <label class="col-sm-3 control-label">Giá nhập:</label>
        <div class="col-sm-9">
            <input name="price" class="form-control" type="text" id="price" placeholder="Giá nhập sách" value="<?php echo $book['price'];?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Giá bán:</label>
        <div class="col-sm-9">
            <input name="sale_price" class="form-control" type="text" id="sale" placeholder="Giá bán" value="<?php echo $book['sale_price'];?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nhà xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('publisher', array( 'class' => 'form-control',
            'type' => 'text', 'label' => false, 'div' => false, "placeholder" => "Nhà xuất bản"));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Ngày xuất bản:</label>
        <div class="col-sm-9">
            <input name="publish_date" class="form-control datepicker" 
                type="text" id="DealDate" placeholder="Ngày xuất bản" value="<?php echo $dateDeal ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Đã xuất bản:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('published', ['multiple' => 'checkbox', 'label'=>false, 'style'=>'margin-left:-20px; margin-top:-5px;']); ?>
        </div>
    </div>    
    <div class="form-group">
        <label class="col-sm-3 control-label">Tác giả:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('writers', array( 'class' => 'form-control',
            'multiple' => 'multiple', 'type' => 'select', 'label' => false, 'div' => false, "placeholder" => "Tác giả", 'options' => $writers));?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Nội dung:</label>
        <div class="col-sm-9">
            <?php echo $this->Form->input('info', array( 'class' => 'ckeditor', 'label' => false, 'div' => false, "placeholder" => "Nội dung"));?>
        </div>
    </div>
    <div class="form-group" style="text-align: center;">
        <?= $this->Form->button(__('Cập nhật'), ['class'=>'btn btn-success']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
