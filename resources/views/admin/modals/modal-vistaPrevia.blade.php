<div id="ADSER_VistaP_Modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="VistPreva_Contenido Modal_Contenidos_C d-none" id="VistPreva_Contenido">

            </div>
            <div class="ImagenesServicio_Contenido Modal_Contenidos_C row d-none" id="ImagenesServicio_Contenido">
            </div>

            <div class="ImagenesPrograma_Contenido Modal_Contenidos_C row d-none" id="ImagenesPrograma_Contenido">
            </div>

            <div class="TextoServicio_Contenido Modal_Contenidos_C d-none" id="TextoServicio_Contenido">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="TSC_OldCnt">Contenido Antiguo</label>
                    <textarea name="" class="form-control mt-2" id="TSC_OldCnt" cols="30" rows="6"></textarea>
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <div class="form-group">
                    <label for="TSC_NewCnt">Contenido Nuevo</label>
                    <textarea name="" class="form-control mt-2" id="TSC_NewCnt" cols="30" rows="6"></textarea>
                    <input type="hidden" id="TSC_IDCnt">
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <div class="form-group GB-Flex">
                    <button type="button" class="btn btn-primary" id="TSC_NewCnt_Btn">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="TextoProgramas_Contenido Modal_Contenidos_C d-none" id="TextoProgramas_Contenido">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="TSC_OldCnt_Pro">Contenido Antiguo</label>
                    <textarea name="" class="form-control mt-2" id="TSC_OldCnt_Pro" cols="30" rows="6"></textarea>
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <div class="form-group">
                    <label for="TSC_NewCnt_Pro">Contenido Nuevo</label>
                    <textarea name="" class="form-control mt-2" id="TSC_NewCnt_Pro" cols="30" rows="6"></textarea>
                    <input type="hidden" id="TSC_IDCnt_Pro">
                  </div>
                </div>
                <div class="col-12 mt-3">
                  <div class="form-group GB-Flex">
                    <button type="button" class="btn btn-primary" id="TSC_NewCnt_Btn_Pro">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
        {{-- <div class="modal-footer GB-Flex"> --}}
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button> --}}
          {{-- <button type="button" class="btn btn-primary"></button> --}}
        {{-- </div> --}}
      </div>
    </div>
</div>