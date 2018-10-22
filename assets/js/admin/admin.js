switch(window.location.origin){
    case 'http://diamondtour.vn':
        var HOSTNAME = 'http://diamondtour.vn/';
        break;
    default:
        var HOSTNAME = 'http://localhost/honghanh/';
}
switch(window.location.origin){
    case 'http://diamondtour.vn':
        var HOSTNAMEADMIN = 'http://diamondtour.vn/admin';
        break;
    default:
        var HOSTNAMEADMIN = 'http://localhost/honghanh/admin';
}
$('#nav-product').html($('#nav-product1').html());
$(".form-horizontal").on('click','a[aria-controls^="version"]',function(){
    $('.remove.version').removeClass('show');
    $('[aria-controls="'+$(this).attr('aria-controls')+'"] i').addClass('show');
    $('[aria-controls^="version"] span.badge').css('background-color','#777');
    $('[aria-controls="'+$(this).attr('aria-controls')+'"] span').css('background-color','#3366CC');
});
$(".form-horizontal").on('click','.specifications',function(){
	$.validator.setDefaults({
		ignore: ":hidden:not('.col-xs-12.date input')"
	});
	$('#register-form').validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).addClass("input-error");
			$(element).closest('.col-xs-12').addClass("has-errors");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.col-xs-12').removeClass("has-errors");
			$(element).removeClass("input-error");
		},
		rules: {
			title: {
				required: true
			},
			parent_id_shared: {
				required: true
			}
		},
		messages: {
			title: {
				required: "Tiêu đề không được trống."
			},
			parent_id_shared: {
				required: "Vui lòng chọn danh mục cha."
			}
		},

	});
	if ($('#register-form').valid() === false){
		if($("select[name=parent_id_shared]").parent().attr("class") == "col-xs-12 has-errors"){
			$("select[name=parent_id_shared]")[0].focus();
		}else{
			$(".col-xs-12.has-errors input")[0].focus();
		}
		return false;
	}else{
		$('#nav-product').html($('#nav-product2').html());
	}
});

function change_title(ev){
    if(ev.value == ''){
        ev.parentElement.classList.add("has-error");
        ev.parentElement.querySelector('span').classList.remove("hidden");
    }else{
        ev.parentElement.querySelector('span').classList.add("hidden");
        ev.parentElement.classList.remove("has-error");
    }
} 
$(".form-horizontal").on('click','.information',function(){
		$('#nav-product').html($('#nav-product1').html());
});

$(".form-horizontal").on('click','.highlights',function(){
        $('#nav-product').html($('#nav-product3').html());
});

function highlights(name,post){
    number_highlights = document.querySelectorAll(`#add-${name} [id^="demo${name}"]`);
    var highlights = [];
    for (var i = 0; i < number_highlights.length; i++) {
        if(number_highlights[i].querySelector('.image').files.length == 0){
            post.append(`${name}_img[]`,i);
        }else{
            post.append(`${name}_img[]`,number_highlights[i].querySelector('.image').files[0]);
        }
        highlights[i] = [];
        highlights[i]['title'] = number_highlights[i].querySelector(`[id^="${name}"] .title`).value;
        highlights[i]['content'] = number_highlights[i].querySelector(`[id^="${name}"] .content`).value;
           
    }
    for (var i = 0; i < highlights.length; i++) {
        post.append(`${name}title[]`,highlights[i]['title']);
        post.append(`${name}content[]`,highlights[i]['content']);
    }
        
}

function version(post){
    number_version = document.querySelectorAll(`#color-products [id^="version"]`);
    for (var i = 0; i < number_version.length; i++) {
        post.append(`versiontitle[]`,number_version[i].querySelector(`.tab-content .title`).value);
        number_color = number_version[i].querySelectorAll(`.content-full-color [id^="color${number_version[i].id}"]`);
        var versions = [];
        for (var j = 0; j < number_color.length; j++) {
            if(number_color[j].querySelector('.img_color').files.length == 0){
                post.append(`${number_version[i].id}_img[]`,j);
            }else{
                post.append(`${number_version[i].id}_img[]`,number_color[j].querySelector('.img_color').files[0]);
            }
            if(number_color[j].querySelector('.icon_color').files.length == 0){
                post.append(`${number_version[i].id}_icon[]`,j);
            }else{
                post.append(`${number_version[i].id}_icon[]`,number_color[j].querySelector('.icon_color').files[0]);
            }
            post.append(`${number_version[i].id}title[]`,number_version[i].querySelectorAll(`[id^="color${number_version[i].id}"] .tab-content .title`)[j].value);
            if(number_color[j].querySelector('.code_color')){
                post.append(`${number_version[i].id}_code[]`,number_color[j].querySelector('.code_color').value);
            }else{
                post.append(`${number_version[i].id}_code[]`,j);
            }
            
        }
    }
}

function submit_shared(){
    id = 'content-full-version';
    for (var i = 0; i < document.querySelectorAll(`#${id} .title`).length; i++) {
        if(document.querySelectorAll(`#${id} .title`)[i].value.trim() == ''){
            document.querySelectorAll(`#${id} .title`)[i].parentElement.classList.add("has-error");
            document.querySelectorAll(`#${id} .title`)[i].setAttribute('oninput','change_title(this)');
            document.querySelectorAll(`#${id} .title`)[i].parentElement.querySelector('span').classList.remove("hidden");
        }
    }
    if(document.querySelectorAll(`#${id} div.has-error`).length > 0){
        number_title = document.querySelectorAll(`#${id} div.has-error .title`);
        parent_id1 = number_title[0].closest('[id^="version"]').id;
        document.querySelector(`#${id} ul li.active`).classList.remove('active');
        document.querySelector(`#${id} .tab-content [id^="version"].active`).setAttribute('class','tab-pane fade');
        document.querySelector(`#${id} ul li a[href="#${parent_id1}"]`).parentElement.classList.add('active');
        document.querySelector(`#${id} #${parent_id1}`).setAttribute('class','tab-pane fade active in');
        document.querySelector(`[href="#${parent_id1}"]`).setAttribute('aria-expanded','true');
        document.querySelector('.remove.version.show').classList.remove('show');
        document.querySelector(`[href="#${parent_id1}"] i`).classList.add('show');
        $('[aria-controls^="version"] span.badge').css('background-color','#777');
        document.querySelector(`[href="#${parent_id1}"] span`).style.backgroundColor = '#3366CC';
        if(number_title[0].closest(`[id^="color${parent_id1}"]`)){
            parent_id2 = number_title[0].closest(`[id^="color${parent_id1}"]`).id;
            document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('class','col-xs-10 check-collapse'); 
            document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('aria-expanded','true'); 
            document.querySelector(`#${parent_id2}`).setAttribute('class','form-group collapse in');
            document.querySelector(`#${parent_id2}`).setAttribute('aria-expanded','true');
            document.querySelector(`#${parent_id2}`).setAttribute('style','');
        }
        document.querySelector(`#${parent_id1}`).parentElement.parentElement.querySelector('ul li.active a').setAttribute('aria-expanded','false');
        number_title[0].focus();
        return false;
    }else{
        var html = `<div class="modal" role="dialog" style="display: block; opacity: 0.5">
                        <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
                            <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
                        </div>
                    </div>`;
        if(window.location.pathname.indexOf("/product/edit/") != '-1'){
            var url = window.location.href;
        }else{
            var url = HOSTNAME + 'admin/product/create';
        }
        var post = new FormData(document.querySelector('form.form-horizontal'));
        highlights('design',post);
        highlights('technology',post);
        highlights('untilities',post);
        version(post);
        post.append(`number_version`,document.querySelectorAll(`#color-products [id^="version"]`).length);
        $.ajax({
                method: "post",
                url: url,
                data: post,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#submit-shared').prop('disabled', true);
                    $('#encypted_ppbtn_all').html(html);
                },
                success: function(response){
                    $("#submit-shared").removeAttr('disabled');
                    $('#encypted_ppbtn_all').html('');
                    if(response.status == 200){
                        csrf_hash = response.reponse.csrf_hash;
                        if (response.isExisted == true) {
                            alert(response.message);
                            if(window.location.pathname.indexOf("/product/edit/") != '-1'){
                                $("input[name='csrf_motorbike_token']").val(csrf_hash);
                            }else{
                                window.location.href=HOSTNAMEADMIN+"/product";
                            }
                        }
                    }
                },
                error: function(jqXHR, exception){
                    alert(jqXHR.responseJSON.message);
                    console.log(errorHandle(jqXHR, exception));
                    location.reload();
                }
            });
    }
}
$(".form-horizontal").on('click','.color-products',function(){
    id = 'highlights';
    for (var i = 0; i < document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`).length; i++) {
        if(document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].value.trim() == ''){
            document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].parentElement.classList.add("has-error");
            document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].setAttribute('oninput','change_title(this)');
            document.querySelectorAll(`#${id} [id^=demo] .tab-content .title`)[i].parentElement.querySelector('span').classList.remove("hidden");
        }
    }
    if(document.querySelectorAll(`#${id} div.has-error`).length > 0){
        number_title = document.querySelectorAll(`#${id} div.has-error .title`);
        parent_id1 = number_title[0].closest('[id^="add-"]').id.replace('add-','');
        parent_id2 = number_title[0].closest(`[id^="demo${parent_id1}"]`).id;
        document.querySelector(`#${id} ul li.active`).classList.remove('active');
        if(document.querySelector(`#${id} .tab-content #design.active`)){
            document.querySelector(`#${id} .tab-content #design.active`).setAttribute('class','tab-pane fade');
        }
        if(document.querySelector(`#${id} .tab-content #technology.active`)){
            document.querySelector(`#${id} .tab-content #technology.active`).setAttribute('class','tab-pane fade');
        }
        if(document.querySelector(`#${id} .tab-content #untilities.active`)){
            document.querySelector(`#${id} .tab-content #untilities.active`).setAttribute('class','tab-pane fade');
        }
        document.querySelector(`#${id} ul li.${parent_id1}`).classList.add('active');
        document.querySelector(`#${id} #${parent_id1}`).setAttribute('class','tab-pane fade active in');
        document.querySelector(`[href="#${parent_id1}"]`).setAttribute('aria-expanded','true');
        document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('class','col-xs-10 check-collapse'); 
        document.querySelector(`#${parent_id2}`).parentElement.querySelector(`[data-target="#${parent_id2}"]`).setAttribute('aria-expanded','true'); 
        document.querySelector(`#${parent_id2}`).setAttribute('class','form-group collapse in');
        document.querySelector(`#${parent_id2}`).setAttribute('aria-expanded','true');
        document.querySelector(`#${parent_id2}`).setAttribute('style','');
        number_title[0].focus();
        return false;
    }
	$('#nav-product').html($('#nav-product4').html());
});


function addHighlights(ev){
	number = Number(ev.parentElement.parentElement.querySelector('.number-highlights').value);
	name = ev.parentElement.parentElement.id;
    let [html, count_li] = ['',0];
    if(number <= 0){
        alert(`Số highlights ít nhất phải lớn hơn 0`);
        number_highlights = document.querySelectorAll('[id^="demo"]').length == 0 ? '' : document.querySelectorAll('[id^="demo"]').length;
        document.querySelector('.number-highlights').value = number_highlights;
    	return false;
    }
    for(i = 0; i< number; i++){
        let [count_li , li, content] = [0, '', ''];
        html += `<div class="col-xs-12" style="margin-bottom:4px;"> 
                    <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                        <span data-toggle="collapse" data-target="#demo${name}${i+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                            <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${i+1}</span>
                            <b style="font-size: 1.1em;font-weight: 500;"></b> 
                        </span>
                        <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(${i+1},this)"></i>
                    </div>
                    <div id="demo${name}${i+1}" class="collapse in form-group">
                        <div class="col-xs-12" style="padding: 0px;">
                            <div class="col-sm-12 col-xs-12">
                                <label class="control-label" >Hình ảnh</label>
                                <input type="file" name="image_${name}[]" value="" placeholder="" class="form-control image">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                <div class="tab-content">
				                    <div role="tabpanel" class="tab-pane fade active in" id="${name}${i+1}">
				                        <div class="box box-default" style="border-top:none;">
				                            <div class="box-body" style="padding:0px;">
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Tiêu đề</label>
				                                    <input type="text" name="title${name}[]" value="" placeholder="" class="form-control title">
				                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
				                                </div>
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Nội dung</label>
				                                    <textarea name="content${name}[]" value="" placeholder="" class="form-control content"></textarea>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
        `;
    }
    ev.parentElement.parentElement.querySelector('[id^="add-"]').innerHTML =  html;
}
function addOneHighlights(ev){
	name = ev.parentElement.parentElement.id;
	let [count_li , li, content, html, number] = [0, '', '', '', document.querySelectorAll(`[id^="demo${name}"]`).length];
        html += `<div class="col-xs-12" style="margin-bottom:4px;"> 
                    <div class="btn btn-primary col-ms-12" style="padding:0px; padding-top:5px; width:100%;text-align:left;">
                        <span data-toggle="collapse" data-target="#demo${name}${number+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px;">
                            <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${number+1}</span>
                            <b style="font-size: 1.1em;font-weight: 500;"></b> 
                        </span>
                        <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_highlights(${number+1},this)"></i>
                    </div>
                    <div id="demo${name}${number+1}" class="collapse in form-group">
                        <div class="col-xs-12" style="padding: 0px;">
                            <div class="col-sm-12 col-xs-12">
                                <label class="control-label" >Hình ảnh</label>
                                <input type="file" name="image_${name}[]" value="" placeholder="" class="form-control image">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="col-ms-12" style="margin-top:10px;padding-top:5px;border-top:2px solid green;">
                                <div class="tab-content">
				                    <div role="tabpanel" class="tab-pane fade active in" id="${name}${number+1}">
				                        <div class="box box-default" style="border-top:none;">
				                            <div class="box-body" style="padding:0px;">
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Tiêu đề</label>
				                                    <input type="text" name="title${name}[]" value="" placeholder="" class="form-control title">
				                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
				                                </div>
				                                <div class="col-xs-12" style="padding:0px;">
				                                    <label class="control-label" for="">Nội dung</label>
				                                    <textarea name="content${name}[]" value="" placeholder="" class="form-control content"></textarea>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
        `;
    ev.parentElement.parentElement.querySelector('[id^="add-"]').insertAdjacentHTML('beforeend', html);
    document.querySelector(`#${name} .number-highlights`).value = document.querySelectorAll(`[id^="demo${name}"]`).length;
}

function remove_highlights(id,ev){
	ids = ev.closest('[id^="add-"]').parentElement.id.replace('add-','');
	ev.closest('[id^="add-"]').removeChild(document.getElementById(`demo${ids}${id}`).parentElement);
	let demo = document.querySelectorAll(`[id^="demo${ids}"]`);
    for (i = id; i <= demo.length; i++) {
        demo[i-1].id = `demo${ids}${i}`;
        demo[i-1].parentElement.querySelector(`span[data-target^="#demo${ids}"]`).setAttribute('data-target',`#demo${ids}${i}`);
		demo[i-1].querySelector(`.tab-content [id^="${ids}"]`).id = `${ids}${demo[i-1].id.replace(`demo${ids}`, "")}`;
        demo[i-1].parentElement.querySelector(`span[data-target^="#demo${ids}"] span`).innerHTML = i;
        demo[i-1].parentElement.querySelector(`span[data-target^="#demo${ids}"]`).nextElementSibling.setAttribute('onclick',`remove_highlights(${i},this)`);
    }
    number_highlights = demo.length == 0 ? '' : demo.length;
    document.querySelector(`#${ids} .number-highlights`).value = number_highlights;
}




function addVersion(ev){
	number = Number(ev.parentElement.parentElement.querySelector('.numberversion').value);
	name = 'version';
    let [html, count_li, tab_li] = ['',0,''];
    if(number <= 0){
        alert(`Số phiên bản phải lớn hơn 0`);
        number_highlights = document.querySelectorAll('[id^="demo"]').length == 0 ? '' : document.querySelectorAll('[id^="demo"]').length;
        document.querySelector('.number-highlights').value = number_highlights;
    	return false;
    }
    for(i = 0; i< number; i++){
        let [count_li , li, content] = [0, '', ''];
        tab_li += `<li role="presentation" class="${(i == 0) ? 'active' : '' }">
            <a href="#${name}${i+1}" aria-controls="${name}${i+1}" role="tab" data-toggle="tab" style="position:relative">
                <span class="badge" ${(i == 0) ? 'style="background-color:#3366CC;"' : '' }>${i+1}</span>
                <i style="position:absolute;top:0px; right:0px;cursor:pointer;" class="fa fa-close remove version ${(i == 0) ? 'show' : '' }" onclick="remove_version(${i+1},this)"></i>
            </a>
        </li>`;
        html += `
            <div role="tabpanel" class="tab-pane fade ${(i == 0) ? 'in active' : '' }" id="${name}${i+1}">
                <div class="col-ms-12" style="margin-top:15px;padding:0px;">
                    <div class="tab-content">
	                    <div role="tabpanel" class="tab-pane in active">
	                        <div class="" style="border-top:none;">
	                            <div class="box-body" style="padding:0px;">
	                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
	                                    <div class="col-md-12" style="margin-top:5px;">
	                                        <label class="control-label" for="">Nhập tên cho phiên bản</label>
	                                        <input type="text" name="titleversion[]" class="form-control title" />
	                                        <span class="help-block hidden">Bạn cần nhập trường này</span>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                </div>
                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                    <label class="col-md-12" for="">
                            Nhập số màu sắc của phiên bản
                    </label>
                    <div class="col-md-10" style="margin-top:5px;">
                        <input type="text" name="numbercolor" class="form-control numbercolor" onkeypress=" return isNumberKey(event)"/>
                    </div>
                    <div class="col-md-2" style="margin-top:5px;">
                        <span class="btn btn-primary form-control append-date" id="button-numbercolor" onclick="addColor(this)">Xác nhận</span>
                    </div>
                </div>
                <div class="content-full-color">
                    
                </div>
                <div class="col-xs-12">
                    <i class="fa-2x fa fa-plus-square" id="addpend-one-color" onclick="addOneColor(this)" style="float: right;cursor: pointer;"></i>
                    <div class="col-xs-12 border" style="border-bottom: 1px solid green;margin-bottom:10px;margin-top:10px;"></div>
                </div>
            </div>
        `;
        document.querySelector('#generate_name').insertAdjacentHTML('beforeend', `<input type="file" name="${name}${i+1}_img[]" value="" multiple="" />`);
    }
    document.querySelector('#content-full-version div ul').innerHTML = tab_li;
    document.querySelector('#content-full-version .tab-content').innerHTML = html;
}

function addOneVersion(){
    name = 'version';
    number = Number(document.querySelectorAll(`[id^="${name}"]`).length);
    let [html, count_li, tab_li, html_full, li, content] = ['',0,'','','',''];
    tab_li += `<li role="presentation" class="${(number == 0) ? 'active' : '' }">
        <a href="#${name}${number+1}" aria-controls="${name}${number+1}" role="tab" data-toggle="tab" style="position:relative">
            <span class="badge" ${(number == 0) ? 'style="background-color:#3366CC;"' : '' }>${number+1}</span>
            <i style="position:absolute;top:0px; right:0px;cursor:pointer;" class="fa fa-close remove version ${(number == 0) ? 'show' : '' }" onclick="remove_version(${number+1},this)"></i>
        </a>
    </li>`;
    html += `
        <div role="tabpanel" class="tab-pane fade ${(number == 0) ? 'in active' : '' }" id="${name}${number+1}">
            <div class="col-ms-12" style="margin-top:15px;padding:0px;">
                <div class="tab-content">
	                <div role="tabpanel" class="tab-pane in active">
	                    <div class="" style="border-top:none;">
	                        <div class="box-body" style="padding:0px;">
	                            <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
	                                <div class="col-md-12" style="margin-top:5px;">
	                                    <label class="control-label" for="">Nhập tên cho phiên bản</label>
	                                    <input type="text" name="titleversion[]" class="form-control title" />
	                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
                </div>
            </div>
            <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
                <label class="col-md-12" for="">
                        Nhập số màu sắc của phiên bản
                </label>
                <div class="col-md-10" style="margin-top:5px;">
                    <input type="text" name="numbercolor" class="form-control numbercolor" onkeypress=" return isNumberKey(event)"/>
                </div>
                <div class="col-md-2" style="margin-top:5px;">
                    <span class="btn btn-primary form-control button-numbercolor" onclick="addColor(this)">Xác nhận</span>
                </div>
            </div>
            <div class="content-full-color">
                
            </div>
            <div class="col-xs-12">
                <i class="fa-2x fa fa-plus-square" id="addpend-one-color" onclick="addOneColor(this)" style="float: right;cursor: pointer;"></i>
                <div class="col-xs-12 border" style="border-bottom: 1px solid green;margin-bottom:10px;margin-top:10px;"></div>
            </div>
        </div>
    `; 
    document.querySelector('#generate_name').insertAdjacentHTML('beforeend', `<input type="file" name="${name}${number+1}_img[]" value="" multiple="" />`);
    document.querySelector('#content-full-version div ul').insertAdjacentHTML('beforeend', tab_li);
    document.querySelector('#content-full-version .tab-content').insertAdjacentHTML('beforeend', html);
    document.querySelector(`#numberversion`).value = Number(document.querySelectorAll(`[id^="${name}"]`).length);
}

function remove_version(id,ev){
    name = 'version';
    document.querySelector('#content-full-version div ul').removeChild(ev.parentElement.parentElement);
    document.querySelector('#content-full-version .tab-content').removeChild(document.getElementById(`${name}${id}`));
    document.querySelector('#generate_name').removeChild(document.querySelector(`#generate_name input[name="${name}${id}_img[]"]`));
    let demo = document.querySelectorAll(`[id^="${name}"]`);
    if(demo.length > 0){
        if(id == 1){
            demo[0].setAttribute('class','tab-pane fade in active');
            document.querySelector(`[href="#${name}${Number(id)+1}"]`).parentElement.classList.add('active');
            document.querySelector(`[href="#${name}${Number(id)+1}"] i`).classList.add('show');
            document.querySelector(`[href="#${name}${Number(id)+1}"] span`).style.backgroundColor = '#3366CC';
        }else{
            demo[Number(id)-2].setAttribute('class','tab-pane fade in active');
            document.querySelector(`[href="#${name}${Number(id)-1}"]`).parentElement.classList.add('active');
            document.querySelector(`[href="#${name}${Number(id)-1}"] i`).classList.add('show');
            document.querySelector(`[href="#${name}${Number(id)-1}"] span`).style.backgroundColor = '#3366CC';
        }
    }
    for (i = id; i <= demo.length; i++) {
        demo[i-1].id = `${name}${i}`;
    	let demos = document.querySelectorAll(`#${name}${i} .content-full-color [id^="color${name}"]`);
	    for (j = 1; j <= demos.length; j++) {
	        demos[j-1].querySelector('.img_color').setAttribute('name',`img_color${name}${i}${j}`);
	        demos[j-1].querySelector('.icon_color').setAttribute('name',`icon_color${name}${i}${j}`);
	        demos[j-1].querySelector('.code_color').setAttribute('name',`code_color${name}${i}${j}`);
	        demos[j-1].querySelector(`[name^="title${name}"]`).setAttribute('name',`title${name}${i}${j}`);//demos[j].id.replace(`color${name}`, "")
	        demos[j-1].id = `color${name}${i}${j}`;
	        demos[j-1].parentElement.querySelector(`span[data-target^="#color${name}"]`).setAttribute('data-target',`#color${name}${i}${j}`);
	    }
        document.querySelector(`#content-full-version div ul li a[href="#${name}${i+1}"]`).setAttribute('aria-controls',`${name}${i}`);
        document.querySelector(`#content-full-version div ul li a[href="#${name}${i+1}"] span`).innerHTML = i;
        document.querySelector(`#content-full-version div ul li a[href="#${name}${i+1}"] i`).setAttribute('onclick',`remove_version(${i},this)`);
        document.querySelector(`#content-full-version div ul li a[href="#${name}${i+1}"]`).setAttribute('href',`#${name}${i}`);

        document.querySelector(`#generate_name input[name="${name}${i+1}_img[]"]`).setAttribute('name',`${name}${i}_img[]`);
    }
    number_version = demo.length == 0 ? '' : demo.length;
    document.querySelector(`#numberversion`).value = number_version;
}



// thêm nhiều field
function addColor(ev){
    name = ev.closest('[id^="version"]').id;
    number = Number(document.querySelector(`#${name} .numbercolor`).value);
    html = '';
    for(i = 0; i< number; i++){
        let [content, count_li, li] = ['',0,''];
        html += `
            <div class="col-xs-12" style="margin-bottom:4px;">
                <div class="btn btn-primary col-ms-12 color_product" style="padding:0px; padding-top:5px; width:100%;text-align:left">
                    <span data-toggle="collapse" data-target="#color${name}${i+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px">
                        <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${i+1}</span>
                        <b style="font-size: 1.18em;font-weight: 500;"></b> 
                    </span>
                    <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_color(${i+1},this)"></i>
                </div>
                <div id="color${name}${i+1}" class="collapse in form-group">
                    <div class="col-xs-12" style="padding:0px;">
                        <div class="col-xs-12">
                            <label class="control-label" for="inputError">Hình ảnh sản phẩm theo màu sắc</label>
                            <input type="file" name="img_color${name}${i+1}" value="" placeholder="" class="form-control img_color">
                        </div>
                        <div class="col-xs-12">
                            <label class="control-label" for="inputError">Hình ảnh icon cho màu sản phẩm</label>
                            <input type="file" name="icon_color${name}${i+1}" value="" placeholder="" class="form-control icon_color">
                        </div>
                        <div class="col-xs-12" style="margin-bottom:5px;">
                            <label class="control-label" for="inputError">Mã sản phẩm</label>
                            <input type="text" name="code_color${name}${i+1}" value="" placeholder="" class="form-control code_color">
                        </div>
                        <div class="tab-content">
		                    <div role="tabpanel" class="tab-pane fade active in">
		                        <div class="" style="border-top:none;">
		                            <div class="box-body" style="padding:0px;">
		                                <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
		                                    <div class="col-md-12" style="margin-top:5px;">
		                                        <label class="control-label" for="">Nhập tên màu sắc cho sản phẩm</label>
		                                        <input type="text" name="title${name}${i+1}" class="form-control title" />
		                                        <span class="help-block hidden">Bạn cần nhập trường này</span>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }
    document.querySelector(`#${name} .content-full-color`).innerHTML = html;
}

// thêm 1 field
function addOneColor(ev){
    name = ev.closest('[id^="version"]').id;
    number = Number(document.querySelector(`#${name} .numbercolor`).value);
    let [html, content, count_li, li] = ['', '', 0, ''];
    html += `
        <div class="col-xs-12" style="margin-bottom:4px;">
            <div class="btn btn-primary col-ms-12 color_product" style="padding:0px; padding-top:5px; width:100%;text-align:left">
                <span data-toggle="collapse" data-target="#color${name}${number+1}" class="col-xs-10 check-collapse" style="height:35px;padding-top:2px">
                    <span style="padding-left:10px;font-weight: 500;font-size: 1.2em;">${number+1}</span>
                    <b style="font-size: 1.18em;font-weight: 500;"></b> 
                </span>
                <i style="float: right;padding-right:5px;marrgin-top:-10px;" class="fa-2x fa fa-close remove" onclick="remove_color(${number+1},this)"></i>
            </div>
            <div id="color${name}${number+1}" class="collapse in form-group">
                <div class="col-xs-12" style="padding:0px;">
                    <div class="col-xs-12">
                        <label class="control-label" for="inputError">Hình ảnh cho sản phẩm</label>
                        <input type="file" name="img_color${name}${number+1}" value="" placeholder="" class="form-control img_color">
                    </div>
                    <div class="col-xs-12">
                        <label class="control-label" for="inputError">Hình ảnh icon cho màu sản phẩm</label>
                        <input type="file" name="icon_color${name}${number+1}" value="" placeholder="" class="form-control icon_color">
                    </div>
                    <div class="col-xs-12" style="margin-bottom:5px;">
                        <label class="control-label" for="inputError">Mã sản phẩm</label>
                        <input type="text" name="code_color${name}${number+1}" value="" placeholder="" class="form-control code_color">
                    </div>
                    <div class="tab-content">
		                <div role="tabpanel" class="tab-pane fade active in">
		                    <div class="" style="border-top:none;">
		                        <div class="box-body" style="padding:0px;">
		                            <div class="col-md-12" style="padding: 0px;margin-bottom: 10px;">
		                                <div class="col-md-12" style="margin-top:5px;">
		                                    <label class="control-label" for="">Nhập tên màu sắc cho sản phẩm</label>
		                                    <input type="text" name="title${name}${number+1}}" class="form-control title" />
		                                    <span class="help-block hidden">Bạn cần nhập trường này</span>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    document.querySelector(`#${name} .content-full-color`).insertAdjacentHTML('beforeend', html);
    document.querySelector(`#${name} .numbercolor`).value = number+1;
}



function remove_color(id,ev){
    name = ev.closest('[id^="version"]').id;
    document.querySelector(`#${name} .content-full-color`).removeChild(document.querySelector(`#color${name}${id}`).parentElement);
    let demo = document.querySelectorAll(`#${name} .content-full-color [id^="color${name}"]`);
    for (i = id; i <= demo.length; i++) {
        demo[i-1].querySelector('.img_color').setAttribute('name',`img_color${name}${i}`);
        demo[i-1].querySelector('.icon_color').setAttribute('name',`icon_color${name}${i}`);
        demo[i-1].querySelector('.code_color').setAttribute('name',`code_color${name}${i}`);
        demo[i-1].querySelector(`.tab-content [id^="color${name}"] [name^="title${name}"]`).setAttribute('name',`title${name}${i}`);//demo[i-1].id.replace(`color${name}`, "")
        demo[i-1].id = `color${name}${i}`;
        demo[i-1].parentElement.querySelector(`span[data-target^="#color${name}"]`).setAttribute('data-target',`#color${name}${i}`);
        demo[i-1].parentElement.querySelector(`span[data-target^="#color${name}"] span`).innerHTML = i;
        demo[i-1].parentElement.querySelector(`span[data-target^="#color${name}"]`).nextElementSibling.setAttribute('onclick',`remove_color(${i},this)`);
    }
    document.querySelector(`#${name} .numbercolor`).value = demo.length;
}








