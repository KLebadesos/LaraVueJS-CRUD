
    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}

    <script type="text/x-template" id="modal-template">
      <transition name="modal">
        <div class="modal-mask">
          <div class="modal-wrapper">
            <div class="modal-container">

              <div class="modal-header">
                <slot name="header">
                  default header
                </slot>
              </div>

              <div class="modal-body">
                <slot name="body">
                    
                </slot>
              </div>

              <div class="modal-footer">
                <slot name="footer">
                  
                  
                </slot>
              </div>
            </div>
          </div>
        </div>
      </transition>
    </script>
  </body>
</html>
