@extends('admin.layouts.default')

@section('title', 'Admin')

@section('title-page', 'Menu')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Menu</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div id="app">
					<form action="{{ route('admin.menu.update', 0) }}" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="items" :value="stringify">

						 <div class="col-md-8 col-md-offset-2">
			                <div class="panel panel-default">
			                    <div class="panel-heading">
			                        Edit Menu: <button type="submit" class="btn btn-primary">Save</button>
			                    </div>
			                    <div class="panel-body">
									<input type="text" class="form-control" placeholder="Enter new item" v-model="newItem" @keydown.enter.prevent="addItem">
									<br>
			                        <ul class="list-group">
			                            <li class="list-group-item" v-for="item in items | orderBy 'item'">
											<span v-text="item"></span>
											<button type="button" class="btn btn-dark btn-xs pull-right" @click="removeItem(item)">Remove</button>
			                            </li>
			                        </ul>
			                    </div>
			                </div>
			            </div>
			             
		            </form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.0.3/vue-resource.min.js"></script>
	<script>
		new Vue({
			el: '#app',

			ready: function() {
				this.fetchitems()
			},

			data: {
				items: []
			},

			methods: {
				addItem: function() {
					var item = this.newItem
					if (item) {
						this.items.push(item)
					}
					

					this.newItem = ''
				},

				removeItem: function(item) {
					this.items.$remove(item)
				},

				fetchitems: function() {
					this.$http.get('{{ route('admin.fetch-menu') }}').then(function(response) {
						var data = JSON.parse(response.data)

						this.items = data
					})
				},
			},

			computed: {
				stringify: function() {
					return JSON.stringify(this.items)
				}
			}
		})
	</script>
@endsection