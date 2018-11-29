@extends('layouts.app')

@section('content')
<h1 class="text-center display-4 mt-4 mb-5">Horários</h1>
<div class="container">
  <div id="calendario" class="mb-2">

  </div>
</div>
@endsection

@section('script')
  <script>
    $(document).ready(function() {
      let locacoes = JSON.parse('<?php echo json_encode($locacoes); ?>');
      let eventosDia = [];
      let eventosRecur=[];
      let evento;
      for(let locacao of locacoes) {
        if(locacao['dataInicio'] === locacao['dataFim']) {
          evento = {
            title: locacao['descricao'],
            start: locacao['dataInicio'] + 'T' + locacao['horaInicio'],
            end: locacao['dataFim'] + 'T' + locacao['horaFim']
          }
          eventosDia.push(evento);
        } else {
          evento = {
            title: locacao['descricao'],
            startTime: locacao['horaInicio'],
            endTime: locacao['horaFim'],
            startRecur: locacao['dataInicio'],
            //endRecur: locacao['dataFim']
          }
          eventosRecur.push(evento);
        }        
      }
      let eventos = eventosDia.concat(eventosRecur);
      
      let horarios = document.getElementById('calendario'); 
      let calendario = new FullCalendar.Calendar(horarios, {
        weekends: false,
        locale: 'pt-br',
        header: {
          left:   'prev,next',
          center: 'title',
          right:  'month,agendaWeek,agendaDay'
        },
        defaultView: 'agendaWeek',
        events: eventos
      });
      calendario.render();
    });
  </script>
@endsection