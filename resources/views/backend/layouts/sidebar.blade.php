@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp

 <nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

   @if(Auth::user()->role=='Admin')
   <li class="nav-item has-treeview {{($prefix=='/user')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage User <i class="fas fa-angle-left right"></i><span class=""></span></p>
    </a>
    <ul class="nav nav-treeview">
     <li class="nav-item">
      <a href="{{route('user.view')}}" class="nav-link {{($route=='user.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>View User</p>
      </a>
     </li>
    </ul>
   </li>
   @endif

   <li class="nav-item has-treeview {{($prefix=='/profiles')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Profile <i class="fas fa-angle-left right"></i> <span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('profiles.view')}}" class="nav-link  {{($route=='profiles.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Your Profile</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('profiles.password.view')}}" class="nav-link {{($route=='profiles.password.views')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Change Password</p>
      </a>
     </li>
    </ul>
   </li>

   <li class="nav-item has-treeview {{($prefix=='/setups')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p> Manage Setup <i class="fas fa-angle-left right"></i><span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('setups.student.class.view')}}" class="nav-link  {{($route=='setups.student.class.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Student Class</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.student.year.view')}}" class="nav-link  {{($route=='setups.student.year.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Student Year</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.student.group.view')}}" class="nav-link  {{($route=='setups.student.group.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Student Group</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.student.shift.view')}}" class="nav-link  {{($route=='setups.student.shift.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Student Shift</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('fee.category.view')}}" class="nav-link  {{($route=='fee.category.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Fee Category</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('fee.amount.view')}}" class="nav-link  {{($route=='fee.amount.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Fee Category Amount</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.exam.type.view')}}" class="nav-link  {{($route=='setups.exam.type.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Exam Type</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.subject.view')}}" class="nav-link  {{($route=='setups.subject.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Subject View</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.assing.subject.view')}}" class="nav-link  {{($route=='setups.assing.subject.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Assing Subject</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('setups.designation.view')}}" class="nav-link  {{($route=='setups.designation.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Designation</p>
      </a>
     </li>
    </ul>
   </li>

			<li class="nav-item has-treeview {{($prefix=='/student')?'menu-open':''}}">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-copy"></i>
					<p>	Manage Students <i class="fas fa-angle-left right"></i> <span class=""></span></p>
				</a>
				<ul class="nav nav-treeview ">
					<li class="nav-item">
						<a href="{{route('student.registration.view')}}" class="nav-link  {{($route=='student.registration.view')?'active':''}}">
						 <i class="far fa-circle nav-icon"></i>
							<p>Student Registration</p>
						</a>
					</li>
     <li class="nav-item">
      <a href="{{route('student.roll.view')}}" class="nav-link  {{($route=='student.roll.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Roll Generate</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('student.reg.fee.view')}}" class="nav-link  {{($route=='student.reg.fee.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Registration Fee</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('student.monthly.fee.view')}}" class="nav-link  {{($route=='student.monthly.fee.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Monthly Fee</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('student.exam.fee.view')}}" class="nav-link  {{($route=='student.exam.fee.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Exam Fee</p>
      </a>
     </li>
			 </ul>
			</li>

   <li class="nav-item has-treeview {{($prefix=='/employees')?'menu-open':''}}">
    <a href="#" class="nav-link">
     <i class="nav-icon fas fa-copy"></i>
     <p>Manage Empolyee<i class="fas fa-angle-left right"></i><span class=""></span></p>
    </a>
    <ul class="nav nav-treeview ">
     <li class="nav-item">
      <a href="{{route('employees.reg.view')}}" class="nav-link  {{($route=='employees.reg.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Empolyee Registration</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('employees.salary.view')}}" class="nav-link  {{($route=='employees.salary.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Empolyee Salary</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('employees.leave.view')}}" class="nav-link  {{($route=='employees.leave.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Empolyee leave</p>
      </a>
     </li>
     <li class="nav-item">
      <a href="{{route('employees.attendance.view')}}" class="nav-link  {{($route=='employees.attendance.view')?'active':''}}">
       <i class="far fa-circle nav-icon"></i>
       <p>Empolyee Attendance</p>
      </a>
     </li>
    </ul>
   </li>
  
  </ul>
 </nav>
