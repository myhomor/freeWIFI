 var	openAddStep=0,
		step=0,
		animateTime =  350,
		steps = [
			"Шаг 1. Выберите место, кликнув по карте!",
			"Шаг 2. Оставьте информацию об открытой точке wifi.",
			"Шаг 3. Оставьте ваш e-mail! Зарегистрируйтесь, и Ваши точки не пропадут! Они будут привязаны к вашему аккуанту.",
		]
 
 function newStep(){
	$('.steps').html("<div class='step bg-step_"+step+"'>"+steps[step-1]+"</div>");
 }
 
 function addStep(){
	step++;
	if(step == 1){
		openAddStep=1;
		closeAll();
		setTimeout(function(){
			newStep();
		},animateTime);
	}
 }
 
 $(document).ready(function (){
	$('li.add-place').click(addStep);
	//$('#big-map').click(addStep);
 });