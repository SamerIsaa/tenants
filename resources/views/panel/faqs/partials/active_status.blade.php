
<span class="switch switch-icon">
		<label>
			<input type="checkbox"
                   {{$instance->is_active?'checked':''}}
                   data-url="{{ route('panel.faq.operation' , ['id'=>$instance->id]) }}"
                   class="operation">
			<span></span>
		</label>
</span>



