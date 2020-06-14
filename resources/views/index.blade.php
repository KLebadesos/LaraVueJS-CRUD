@include('layouts.header')

    <div id="app_vue">
      <div class="container">
				<h4 class="mt-5">LaraVueJS CRUD</h4>
				<small>Created with <span class="fa fa-heart"></span> by Kevin Lebadesos</small>
				<p class="alert alert-danger text-center mt-3" v-bind:class="{ hidden: hasError }">
					Please fill all required field(s).
				</p>
        <div class="form-group mt-5">
          <label for="">Name:</label>
          <input class="form-control" type="text" name="name" id="id" placeholder="Enter some name" required v-model="newTask.name">
        </div>
        <div class="form-group">
          <label for="">Profession</label>
          <input class="form-control" type="text" name="profession" placeholder="Enter profession" id="profession" required v-model="newTask.profession">
        </div>
        <div class="form-group">    
          <label for="">Task</label>
          <textarea class="form-control" type="text" name="task" id="task" rows="5" placeholder="Enter task description" required v-model="newTask.task"></textarea>
        </div>
        <div class="btn btn-primary mb-5" @click.prevent="createTask()">
          <span class="fa fa-plus"></span>
          ADD
				</div>
					
					<table id="table" class="table table-striped table-bordered" style="width:100%">
						<thead>
								<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Profession</th>
										<th>Task</th>
										<th width="130px">Action</th>
								</tr>
						</thead>
						<tbody>
								<tr v-for="task in tasks">
										<td>@{{ task.id }}</td>
										<td>@{{ task.name }}</td>
										<td>@{{ task.profession }}</td>
										<td>@{{ task.task }}</td>
										<td>
											<div class="btn btn-info btn-sm" id="show-modal"  @click="showModal=true; setVal(task.id, task.name, task.profession, task.task)">
											<span class="fa fa-pencil-square-o"></span> EDIT
											</div>
											<div class="btn btn-danger btn-sm" @click.prevent="deleteTask(task)">
												<span class="fa fa-trash"></span> DELETE
												</div>
										</td>
								</tr>
						</tbody>
				</table>
				<div class="mb-5"></div>
				<modal v-if="showModal" @close="showModal=false">
					<h3 slot="header">Edit Task</h3>
					<div slot="body">
							<input type="hidden" disabled class="form-control" id="e_id" name="id" required  :value="this.e_id">
							Name: <input type="text" class="form-control" id="e_name" name="name" required  :value="this.e_name">
							Profession: <input type="text" class="form-control" id="e_profession" name="profession" required  :value="this.e_profession">
							Task: <textarea type="text" class="form-control" id="e_task" name="task" required  :value="this.e_task" rows="5"> </textarea>
					</div>
					<div slot="footer">
							<button class="btn btn-default" @click="showModal = false">
							Cancel
						</button>
						
						<button class="btn btn-primary" @click="editTask()">
							Update
						</button>
					</div>
			</modal>
      </div>
		</div>
		
		

@include('layouts.footer')