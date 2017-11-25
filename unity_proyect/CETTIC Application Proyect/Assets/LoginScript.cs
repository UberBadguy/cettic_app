using System;
using System.Collections;
using UnityEngine;
using UnityEngine.SceneManagement;

public class LoginScript : MonoBehaviour {
    
    public UnityEngine.UI.Text status;
    public UnityEngine.UI.InputField username;
    public UnityEngine.UI.InputField password;

    public string privateHash = "estoesunapruebaparaCETTIC";

    public string loginURL = "http://localhost/cettic_test/login.php";

    [Serializable]
    public class WebResponse
    {
        public int id;
        public string response;
        public string msg;
    }
  
    IEnumerator Login(WWW w)
    {
        yield return w;
        WebResponse r = JsonUtility.FromJson<WebResponse>(w.text);
        if (w.error == null)
        {
            if (r.response.Equals("success"))
            {
                PlayerPrefs.SetString("username", username.text);
                PlayerPrefs.SetInt("user_id", r.id);
                SceneManager.LoadScene("main");
                GameObject.FindGameObjectWithTag("GameManager").GetComponent<GameManager>().gameState = GameManager.GameStates.Game;
            }
        }
        status.text = r.msg;
    }

    public void TryLogin()
    {
        status.text = "Logging in...";
        WWWForm form = new WWWForm();
        form.AddField("username", username.text);
        form.AddField("password", password.text);
        form.AddField("hash", privateHash);
        WWW w = new WWW(loginURL, form);
        StartCoroutine(Login(w));
    }
}
