podTemplate(label: 'mypod', containers: [
    containerTemplate(name: 'docker', image: 'docker:latest', ttyEnabled: true, command: 'cat')],
    volumes: [hostPathVolume(hostPath: '/var/run/docker.sock', mountPath: '/var/run/docker.sock')]) {

  node('mypod') {
      stage('Build and Push Frontend'){
          container('docker'){
           git url: 'git://github.com/pblaas/nginxphpfpm.git'
           dir('app'){
             git url: 'git://github.com/pblaas/app1.git'
           }
            stage ('Build Docker image'){
              def imageName = "${env.DOCKERHUB_USER}/${env.NGINXCONTAINER_IMAGE}:${env.BUILD_TAG}"
              sh "docker build -t ${imageName}  ."
              def img= docker.image(imageName)

              stage ('Push Docker image to registry'){
                docker.withRegistry("https://registry.hub.docker.com", "docker-registry") {
                  img.push()
                }
              }
            }
          }
      }
      stage('Build and Push PHP-FPM'){
          container('docker'){
           dir('app'){
             git url: 'git://github.com/pblaas/app1.git'
           }
           git url: 'https://github.com/pblaas/phpfpm.git'
            stage ('Build Docker image'){
              def imageName = "${env.DOCKERHUB_USER}/${env.PHPFPMCONTAINER_IMAGE}:${env.BUILD_TAG}"
              sh "docker build -t ${imageName}  ."
              def img= docker.image(imageName)

              stage ('Push Docker image to registry'){
                docker.withRegistry("https://registry.hub.docker.com", "docker-registry") {
                  img.push()
                }
              }
            }
          }
      }
    }
}
