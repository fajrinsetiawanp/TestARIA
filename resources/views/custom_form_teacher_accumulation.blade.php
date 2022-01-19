@php
	$teacher = App\User::where('id_cms_privileges', 8)->get();

	$order_teacher = App\Models\TbOrderTeacher::where('order_by', g('teacher'))->where('tb_order_teachers.status', g('status'))->whereBetween('tanggal_order', [g('tanggal_awal'), g('tanggal_akhir')])->get();

	foreach($order_teacher as $v) {
		$order_teacher_detail = App\Models\TbOrderDetailTeacher::where('id_order', $v->id)->get();

		$total_all += $order_teacher_detail->sum('total');
		$reward_total_all += $order_teacher_detail->sum('reward_total');
	}
@endphp
<form action="/admin/tb_order_teachers" method="GET">
				<div class="box">
				        <div class="box-body table-responsive no-padding">
				          <table class="table table-bordered">
				            <tbody>
				              <tr class="active">
				                <td colspan="2"><strong><i class="fa fa-bars"></i> Filter</strong></td>
				              </tr>
				              @if(CRUDBooster::myPrivilegeId() == 8)
				              	<input type="hidden" name="teacher" value="{{ CRUDBooster::myId() }}">
				              @else
				              <tr>
				                <td width="25%"><strong>Teacher</strong></td>
				                <td>
				                    <select class="form-control" name="teacher">
				                    	@foreach($teacher as $v)
				                    		<option></option>
				                    		<option value="{{ $v->id }}">{{ $v->name }}</option>
				                    	@endforeach
				                    </select>
				                </td>
				              </tr>
				              @endif
				              <tr>
				                <td width="25%"><strong>Tanggal Awal</strong></td>
				                <td>
				                    <input type="date" name="tanggal_awal" class="form-control">
				                </td>
				              </tr>
				              <tr>
				                <td width="25%"><strong>Tanggal Akhir</strong></td>
				                <td>
				                    <input type="date" name="tanggal_akhir" class="form-control">
				                </td>
				              </tr>
				              <tr>
				                <td width="25%"><strong>Status</strong></td>
				                <td>
				                    <select class="form-control" name="status">
				                    	<option value="Hold">Hold</option>
				                    	<option value="Proses">Process</option>
				                    	<option value="Finish">Finish</option>
				                    	<option value="Paid">Paid</option>
				                    </select>
				                </td>
				              </tr>
				              <tr>
				                    <td width="25%"></td>
				                    <td>
				                        <button type="submit" class="btn btn-success">Search</button>
				                    </td>
				                  </tr>
				            </tbody>
				          </table>
				        </div>
				</div>
			</form>
@if(!empty(g('teacher')) && !empty(g('tanggal_awal')) && !empty(g('tanggal_akhir')) && !empty(g('status')))

@php
	$teacher_id = App\User::find(g('teacher'));
@endphp
<div class="box">
	<div class="box-body table-responsive no-padding">
		<table class="table table-bordered">
			<tbody>
				<tr class="active">
					<td colspan="2"><strong><i class="fa fa-bars"></i> Result</strong></td>
				</tr>
				<tr>
				                <td width="25%"><strong>Teacher</strong></td>
				                <td>
				                    {{ $teacher_id->name }}
				                </td>
				              </tr>  
				              <tr>
				                <td width="25%"><strong>Tanggal Awal</strong></td>
				                <td>
				                    {{ g('tanggal_awal') }}
				                </td>
				              </tr>
				              <tr>
				                <td width="25%"><strong>Tanggal Akhir</strong></td>
				                <td>
				                    {{ g('tanggal_akhir') }}
				                </td>
				              </tr>
				              <tr>
				                <td width="25%"><strong>Status</strong></td>
				                <td>
				                    {{ g('status') }}
				                </td>
				              </tr>
			</tbody>
		</table>
		<div class="box-body table-responsive no-padding">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<td width="25%">
						<div class="panel panel-primary">
					      <div class="panel-heading">Total Sales</div>
					      <div class="panel-body"><h4><strong>Rp. {{ number_format($total_all) }}</strong></h4></div>
					    </div>
					</td>
					<td width="25%">
						<div class="panel panel-success">
					      <div class="panel-heading">Reward Total</div>
					      <div class="panel-body"><h4><strong>Rp. {{ number_format($reward_total_all) }}</strong></h4></div>
					    </div>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
</div>
@endif