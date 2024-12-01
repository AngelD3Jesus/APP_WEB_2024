from django.shortcuts import render, HttpResponse, redirect
# from django.contrib.auth.forms import UserCreationForm
from mainapp.forms import RegistroForm
from django.contrib import messages
from django.contrib.auth import authenticate,login,logout
from django.contrib.auth.decorators import login_required

# Create your views here.

def index(request):
    mensaje = 'hola soy un mensaje'
    return render(request, 'mainapp/index.html', {
        'title': 'Inicio',
        'content': '.:: Bienvenido a la pagina principal ::.',
        'mensaje': mensaje
    })

def about(request):
    return render(request, 'mainapp/about.html', {
        'title': 'Acerca de nosotros',
        'content': 'Somos un equipo de desarrollo de SW'
    })

def mision(request):
    return render(request, 'mainapp/mision.html', {
        'title': 'Mision',
        'content': 'La mision de la empresa'
    })

def vision(request):
    return render(request, 'mainapp/vision.html', {
        'title': 'Vision',
        'content': 'La vision de la empresa'
    })

def Registro(request):
    if request.user.is_authenticated:
        return redirect('inicio')
    else:
        Registro_form=RegistroForm()

        if request.method == "POST":
            Registro_form=RegistroForm(request.POST)    

            if Registro_form.is_valid():
                Registro_form.save()
                messages.success(request,"Registro exitoso")
                return redirect('inicio')
            

        return render(request,'users/register.html',{
        'title': 'Inicio',
        'Registro_form': Registro_form,
        })

def inicioses(request):

    if request.user.is_authenticated:
        return redirect('inicio')
    else:
        if request.method == "POST":
            username=request.POST.get('username')
            password=request.POST.get('password')

            user=authenticate(request,username=username,password=password)

            if user is not None:
                login(request,user)
                messages.success(request,"Bienvenido al inicio de sesion")
                return redirect('inicio')
            else:
                messages.warning(request,"no es posible el acceso utilize las credenciales correctas")

        return render(request, 'users/login.html', {
            'title': 'Inicio de sesion',
    })
def error_404_view(request, exception):
    return redirect('inicio')