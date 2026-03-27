 <body>
       <main>
           

           <!-- Modal -->
           <div class="modal fade" id="modalCertificado" tabindex="-1" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered">
                   <div class="modal-content">

                       <div class="modal-header">
                           <h5 class="modal-title">Post de Certificação</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                       </div>

                       <form action="" method="post" enctype="multipart/form-data">
                           <div class="modal-body">

                               <!-- Título -->
                               <div class="input-group mb-3">
                                   <span class="form-label">
                                       <i class="fa-light fa-pen fa-lg" style="color: #6750a4;"></i>
                                   </span>
                                   <div class="form-floating">
                                       <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título do Post">
                                       <label for="titulo">Título (Ex: Conclusão do curso de ADM)</label>
                                   </div>
                               </div>

                               <!-- Descrição -->
                               <div class="input-group mb-3">
                                   <span class="form-label">
                                       <i class="fa-light fa-align-left fa-lg" style="color: #6750a4;"></i>
                                   </span>
                                   <div class="form-floating">
                                       <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição" style="height: 120px"></textarea>
                                       <label for="descricao">Descrição do curso</label>
                                   </div>
                               </div>

                                <!-- Carga Horaria -->
                               <div class="mb-3">
                                   <label for="certificado" class="form-label">Carga Horaria</label>
                                   <input type="number" class="form-control" id="carga_horaria" name="carga_horaria">
                               </div>

                               <!-- Imagem -->
                               <div class="mb-3">
                                   <label for="certificado" class="form-label">Imagem do Certificado</label>
                                   <input type="file" class="form-control" id="certificado" name="certificado" accept="image/*">
                               </div>
                                

                           </div>

                           <div class="modal-footer">
                               <button type="submit" class="btn btn-success">Publicar</button>
                           </div>
                       </form>

                   </div>
               </div>
           </div>