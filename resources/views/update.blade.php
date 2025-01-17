 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Bootstrap Form</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
         /* Set the height of the body to 100% to center the form vertically */
         body,
         html {
             height: 100%;
             margin: 0;
         }

         /* Create a beautiful background color */
         body {
             background-color: #D63278;
             /* Light sky blue */
         }
         /* Center the form container */
         .form-container {
             background-color: #ffffff;
             /* White background for the form */
             padding: 30px;
             border-radius: 10px;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
             max-width: 500px;
             width: 100%;
         }
     </style>
 </head>
 <body>
     <div class="d-flex justify-content-center align-items-center vh-100">
         <div class="form-container">
             <h1 class="mb-4 text-center">Update User</h1>
             @if (session('success'))
                 <div style="color: rgb(0, 225, 255); margin-bottom:5px">
                     {{ session('success') }}
                 </div>
             @endif
             {{-- @php
                        dd($users);
                    @endphp --}}
             <form action="{{ route('post.update', $users->id) }}" method="POST">
                 @csrf
                 <!-- First Name -->
                 <div class="mb-3">
                     <label for="firstName" class="form-label">First Name</label>
                     <input type="text" value="{{ $users->fname }}" class="form-control" name="fname" required>
                     @error('fname')
                         <div style="color: red">{{ $message }}</div>
                     @enderror
                 </div>

                 <!-- Last Name --> 
                 <div class="mb-3">
                     <label for="lastName" class="form-label">Last Name</label>
                     <input type="text" value="{{ $users->lname }}" class="form-control" name="lname" required>
                     @error('lname')
                         <div style="color: red">{{ $message }}</div>
                     @enderror
                 </div>

                 <!-- Gender -->
                 <div class="mb-3">
                     <label class="form-label">Gender</label>
                     <div>
                         <div class="form-check form-check-inline">

                             <label class="form-check-label" for="male">Male
                                 <input class="form-check-input" type="radio" value="male" value="{{ $users->male }}"
                                     name="gender" required>
                             </label>
                         </div>
                         <div class="form-check form-check-inline">
                             <label class="form-check-label" for="female">Female
                                 <input class="form-check-input" type="radio" value="female" value="{{ $users->female }}"
                                     name="gender" required>
                             </label>
                         </div>
                     </div>
                 </div>

                 <!-- Email -->
                 <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" value="{{ $users->email }}" class="form-control" name="email" required>
                     @error('email')
                         <div style="color: red">{{ $message }}</div>
                     @enderror
                 </div>

                 <!-- Submit Button -->
                 <button type="submit" class="btn btn-primary w-100">update</button>
             </form>
         </div>
     </div>

     <!-- Bootstrap JS (Optional but recommended for interactivity) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>




